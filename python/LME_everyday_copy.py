import pymysql #資料庫套件
import requests
from bs4 import BeautifulSoup
import json

db = pymysql.connect(
        host='127.0.0.1',
        user='root',
        password='',
        database="laravelvuetest",
        port=3306
    )
cursor = db.cursor()

steel_array = [['廢鋼','https://www.lme.com/api/trading-data/day-delayed?datasourceId=935e2e7d-00ed-4297-a655-0dd492dedf5a'], #廢鋼
                ['特種鋁合金','https://www.lme.com/api/trading-data/day-delayed?datasourceId=2dea7bc8-37e2-4381-b97f-fbd72748b1e4'], #特種鋁合金
                ['金','https://www.lme.com/api/trading-data/day-delayed?datasourceId=70b0fc72-facb-458d-8fa1-43aa66cf894e'], #金
                ['鈷','https://www.lme.com/api/trading-data/day-delayed?datasourceId=2b5439b2-f8c0-4b3b-8bf7-ba2a851f00ab'], #鈷
                ['鉛','https://www.lme.com/api/trading-data/day-delayed?datasourceId=bc443de6-0bdd-4464-8845-9504f528b0c6'], #鉛
                ['銀','https://www.lme.com/api/trading-data/day-delayed?datasourceId=78c5915e-aae1-4114-be4f-88da565bef57'], #銀
                ['銅','https://www.lme.com/api/trading-data/day-delayed?datasourceId=762a3883-b0e1-4c18-b34b-fe97a1f2d3a5'], #銅
                ['鋁','https://www.lme.com/api/trading-data/day-delayed?datasourceId=1a0ef0b6-3ee6-4e44-a415-7a313d5bd771'], #鋁
                ['鋁合金','https://www.lme.com/api/trading-data/day-delayed?datasourceId=a60d3ff3-3a17-4b8c-8476-5e8dd0c9b713'], #鋁合金
                ['鋅','https://www.lme.com/api/trading-data/day-delayed?datasourceId=c389e2b0-c4a3-46a0-96ca-69cacbe90ee4'], #鋅
                ['鋼筋','https://www.lme.com/api/trading-data/day-delayed?datasourceId=f894524d-cadf-404b-995a-e9a19f49d394'], #鋼筋
                ['錫','https://www.lme.com/api/trading-data/day-delayed?datasourceId=361d4046-e7b6-4043-af80-8ce9cbee6727'], #錫
                ['鎳','https://www.lme.com/api/trading-data/day-delayed?datasourceId=acadf037-c13f-42f2-b42a-cac9a8179940'] #鎳
            ]

def get_metal_price(url) :
    headers = {
        'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36',
    }
    metal = requests.get(url,headers=headers)
    metal_soup = BeautifulSoup(metal.text,'html.parser')
    metal_data = json.loads(metal_soup.text)
    print(float(metal_data['Rows'][0]['Values'][0]),metal_data['Rows'][0]['HoverValue'])

    cursor.execute("UPDATE lme_metal_prices SET MetalPrice = %s, MetalDate = %s WHERE MetalName = %s", (float(metal_data['Rows'][0]['Values'][0]),str(metal_data['Rows'][0]['HoverValue']),steel_array[i][0]))    # 將金屬價格寫入資料庫
    db.commit()

for i in range(0,13):
    get_metal_price(steel_array[i][1])
db.close()
import pymysql #資料庫套件
from lxml import etree          # 從XPath 拿出資料的套件
from selenium import webdriver  # Python呼叫瀏覽器的套件
from re import sub
from decimal import Decimal
import time
from apscheduler.schedulers.background import BackgroundScheduler  
from apscheduler.executors.pool import ThreadPoolExecutor, ProcessPoolExecutor  
from apscheduler.jobstores.sqlalchemy import SQLAlchemyJobStore  
from apscheduler.events import EVENT_JOB_EXECUTED, EVENT_JOB_ERROR   
from apscheduler.schedulers.blocking import BlockingScheduler
import datetime 


def countdown_24_hours():
    # 資料庫參數設定
    db_settings = {
        "host": "127.0.0.1",
        "port": 3306,
        "user": "root",
        "password": "",
        "db": "laravelvuetest",
        "charset": "utf8"
    }
    # 確認資料庫是否連線成功
    try:
        # 建立Connection物件
        conn = pymysql.connect(**db_settings)
        print("成功")
    except Exception as ex:
        print(ex)


    broswer = webdriver.Chrome()
    # 訪問 倫敦金屬交易所(LME) 頁面
    # 獲取頁面原始碼
    broswer.get('https://www.lme.com/')
    time.sleep(0.5)
    broswer.get('https://www.lme.com/')


    selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件

    # 撈到的資料日期
    date = selector.xpath('/html/body/div/div[2]/div/div[1]/table/thead/tr/th/text()')
    print(date)

    metallist = []
    metallist.append(["鋁","銅", "鋅", "鎳", "鉛", "錫", "鋁合金", "特種鋁合金", "鈷", "金", "銀", "廢鋼", "鋼筋"])
    metallistPrice = []
    for i in range(1,14,1):
        metal = selector.xpath("/html/body/div/div[2]/div/div[1]/table/tbody/tr[" + str(i) + "]/td/text()")  # selector.xpath('貼上剛剛的所要選取的資料的 XPath') 
        metal = metal[0].replace("\n","").replace(" ","")
        metal = float(Decimal(sub(r'[^\d.]', '', metal)))
        metallistPrice.append(metal)

    metallist.append(metallistPrice)
    # metallist = [  '鋁'  ,  '銅'  ,  '鋅' ,   '鎳' ,  '鉛'  ,  '錫' ,  '鋁合金'  ,  '特種鋁合金'  ,  '鈷'  ,  '金' ,  '銀'  ,  '廢鋼'  , '鋼筋'  ]
    #             [ 鋁的錢 , 銅的錢 , 鋅的錢 , 鎳的錢 , 鉛的錢 , 錫的錢 , 鋁合金的錢 , 特種鋁合金的錢 , 鈷的錢 , 金的錢 , 銀的錢 , 廢鋼的錢 , 鋼筋的錢]

    # print(metallist[0])
    # print(metallist[1])
    # print(metallist[0][0]) #鋁
    # print(metallist[1][0]) #鋁的錢

    # 將爬蟲爬到的金屬價格寫入資料庫
    # 建立Cursor物件
    with conn.cursor() as cursor:
        # 修改資料SQL語法
        command = "UPDATE lme_metal_prices SET MetalPrice = %s WHERE MetalName = %s"
        commandDate = "UPDATE lme_metal_prices SET MetalDate = %s WHERE MetalName = %s"
        # 執行指令
        for i in range(0,13,1):
            cursor.execute(command, (metallist[1][i],metallist[0][i]))      # 將金屬價格寫入資料庫
            cursor.execute(commandDate, (date,metallist[0][i]))             # 將日期寫入資料庫

        #儲存變更
        print("LME資料寫入完成")
        conn.commit()
    #完成資料庫的寫入

    #關閉
    broswer.close()

# 記得開一個cmd去執行這個python檔
# 定義一個後臺任務非阻塞排程器
scheduler = BlockingScheduler()  
# 新增一個任務到記憶體中   
# 觸發器：trigger='interval' seconds=10 每10s觸發執行一次  
# 執行器：executor='default' 執行緒執行  

# scheduler.add_job(countdown_24_hours, 'interval', seconds=15, start_date='2020-10-09 19:25:00') 
scheduler.add_job(countdown_24_hours, 'interval', seconds=86400, start_date='2021-1-7 8:36:00')   #從2020.10.12 6:00開始  每24小時執行一次 LME資料抓取
# 啟動排程器  
scheduler.start() 



    # # 鋁的每日價格
    # Aluminium = selector.xpath('/html/body/div/div[2]/div/div[1]/table/tbody/tr[1]/td/text()')  # selector.xpath('貼上剛剛的所要選取的資料的 XPath') 
    # Aluminium = Aluminium[0].replace("\n","").replace(" ","")
    # Aluminium = Decimal(sub(r'[^\d.]', '', Aluminium))
    # print(Aluminium)

    # # 銅的每日價格
    # Copper = selector.xpath('/html/body/div/div[2]/div/div[1]/table/tbody/tr[2]/td/text()')
    # Copper = Copper[0].replace("\n","").replace(" ","")
    # Copper = Decimal(sub(r'[^\d.]', '', Copper))
    # print(Copper)

    # # 鋅的每日價格
    # Zinc = selector.xpath('/html/body/div/div[2]/div/div[1]/table/tbody/tr[3]/td/text()')
    # Zinc = Zinc[0].replace("\n","").replace(" ","")
    # Zinc = Decimal(sub(r'[^\d.]', '', Zinc))
    # print(Zinc)

    # # 鎳的每日價格
    # Nickel = selector.xpath('/html/body/div/div[2]/div/div[1]/table/tbody/tr[4]/td/text()')
    # Nickel = Nickel[0].replace("\n","").replace(" ","")
    # Nickel = Decimal(sub(r'[^\d.]', '', Nickel))
    # print(Nickel)

    # # 鉛的每日價格
    # Lead = selector.xpath('/html/body/div/div[2]/div/div[1]/table/tbody/tr[5]/td/text()')
    # Lead = Lead[0].replace("\n","").replace(" ","")
    # Lead = Decimal(sub(r'[^\d.]', '', Lead))
    # print(Lead)

    # # 錫的每日價格
    # Tin = selector.xpath('/html/body/div/div[2]/div/div[1]/table/tbody/tr[6]/td/text()')
    # Tin = Tin[0].replace("\n","").replace(" ","")
    # Tin = Decimal(sub(r'[^\d.]', '', Tin))
    # print(Tin)

    # # 鋁合金的每日價格
    # AluminiumAlloy = selector.xpath('/html/body/div/div[2]/div/div[1]/table/tbody/tr[7]/td/text()')
    # AluminiumAlloy = AluminiumAlloy[0].replace("\n","").replace(" ","")
    # AluminiumAlloy = Decimal(sub(r'[^\d.]', '', AluminiumAlloy))
    # print(AluminiumAlloy)

    # # 特種鋁合金的每日價格
    # NASAAC = selector.xpath('/html/body/div/div[2]/div/div[1]/table/tbody/tr[8]/td/text()')
    # NASAAC = NASAAC[0].replace("\n","").replace(" ","")
    # NASAAC = Decimal(sub(r'[^\d.]', '', NASAAC))
    # print(NASAAC)

    # # 鈷的每日價格
    # Cobalt = selector.xpath('/html/body/div/div[2]/div/div[1]/table/tbody/tr[9]/td/text()')
    # Cobalt = Cobalt[0].replace("\n","").replace(" ","")
    # Cobalt = Decimal(sub(r'[^\d.]', '', Cobalt))
    # print(Cobalt)

    # # 金的每日價格
    # Gold = selector.xpath('/html/body/div/div[2]/div/div[1]/table/tbody/tr[10]/td/text()')
    # Gold = Gold[0].replace("\n","").replace(" ","")
    # Gold = Decimal(sub(r'[^\d.]', '', Gold))
    # print(Gold)

    # # 銀的每日價格
    # Silver = selector.xpath('/html/body/div/div[2]/div/div[1]/table/tbody/tr[11]/td/text()')
    # Silver = Silver[0].replace("\n","").replace(" ","")
    # Silver = Decimal(sub(r'[^\d.]', '', Silver))
    # print(Silver)

    # # 廢鋼的每日價格
    # SteelScrap = selector.xpath('/html/body/div/div[2]/div/div[1]/table/tbody/tr[12]/td/text()')
    # SteelScrap = SteelScrap[0].replace("\n","").replace(" ","")
    # SteelScrap = Decimal(sub(r'[^\d.]', '', SteelScrap))
    # print(SteelScrap)

    # # 鋼筋的每日價格
    # SteelReba = selector.xpath('/html/body/div/div[2]/div/div[1]/table/tbody/tr[13]/td/text()')
    # SteelReba = SteelReba[0].replace("\n","").replace(" ","")
    # SteelReba = Decimal(sub(r'[^\d.]', '', SteelReba))
    # print(SteelReba)
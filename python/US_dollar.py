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
    # 訪問 臺灣銀行牌告匯率 頁面
    # 獲取頁面原始碼
    broswer.get('https://rate.bot.com.tw/xrt/all/day')

    selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件

    print('美金寫入資料庫時間：',time.strftime('%Y-%m-%d %H:%M:%S', time.localtime()))

    # 撈 美金價格
    USD = selector.xpath('//*[@id="ie11andabove"]/div/table/tbody/tr[1]/td[5]/text()')

    US_dollar = USD[0].replace("\n","").replace(" ","")
    US_dollar = float(Decimal(sub(r'[^\d.]', '', US_dollar)))
    print('美金價格：',US_dollar)


    # 將爬蟲爬到的金屬價格寫入資料庫
    # 建立Cursor物件
    with conn.cursor() as cursor:
        # 修改資料SQL語法
        command = "UPDATE usdollars SET USD = %s WHERE id = %s"
        # 執行指令
        cursor.execute(command, (US_dollar,1))      # 將金屬價格寫入資料庫

        #儲存變更
        print("$US dollar資料寫入完成")
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

# scheduler.add_job(countdown_24_hours, 'interval', seconds=30, start_date='2021-2-2 10:28:00') 
scheduler.add_job(countdown_24_hours, 'interval', seconds=86400, start_date='2021-2-2 16:30:00')   #從2021-1-7 8:36:00開始  每24小時執行一次 資料抓取
# 啟動排程器  
scheduler.start() 





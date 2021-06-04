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

# 資料庫參數設定
db_settings = {
    "host": "127.0.0.1",
    "port": 3306,
    "user": "root",
    "password": "mirdcuc",
    "db": "expertknowledge",
    "charset": "utf8"
}
# 確認資料庫是否連線成功
try:
    # 建立Connection物件
    conn = pymysql.connect(**db_settings)
    print("成功")
except Exception as ex:
    print(ex)


with conn.cursor() as cursor:
    # 查詢資料SQL語法
    command = "SELECT * FROM regionalwindspeeds"
    # 執行指令
    cursor.execute(command)
    # 取得所有資料
    result = cursor.fetchall()
    # print(result[0][0])   // 郵遞區號  PK
    # print(result[0][1])   // 縣市
    # print(result[0][2])   // 地區
    # print(result[0][3])   // 風速
    # print(result[0][4])   // 平均月均溫高
    # print(result[0][5])   // 平均月均溫低
    # print(result[0][6])   // 平均月日照時數
    # print(result[0][7])   // 平均月全天空日射量
    conn.commit()

    commandHigh = "UPDATE regionalwindspeeds SET monthHighTemperature = %s WHERE PostalCode = %s"    # 尋找 取代 哪個 郵遞區號的 最高溫值
    commandLow = "UPDATE regionalwindspeeds SET monthLowTemperature = %s WHERE PostalCode = %s"      # 尋找 取代 哪個 郵遞區號的 最低溫值


    for i in range(0,len(result),1):
        broswer = webdriver.Chrome()
        # print(result[i][0])
        # print(result[i][1])
        # print(result[i][2])
        print(i)
        print("縣市:" + result[i][1])
        print("地區:" + result[i][2])
        test = ""
        Hightlist = []
        Lowlist = []
        
        if result[i][1] == result[i][2]:
            # 訪問 各地區平均月均溫
            # 獲取頁面原始碼
            broswer.get('https://www.google.com/search?rlz=1C1GCEU_zh-TWTW909TW909&ei=W5yGX5mWNNXT-gT53IKIAw&q=' + result[i][1] + '+' + '平均月均溫' + '&oq=' + result[i][1] + '+' + '平均月均溫' + '&gs_lcp=CgZwc3ktYWIQAzoFCAAQsAM6BQgAEM0CUJSJX1jkol9g5KVfaAJwAHgBgAGuAYgBnRKSAQQwLjE2mAEAoAEBqgEHZ3dzLXdpesgBAcABAQ&sclient=psy-ab&ved=0ahUKEwjZr-L6u7PsAhXVqZ4KHXmuADEQ4dUDCA0&uact=5')
            selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
            for j in range(1,13,1):
                # 平均溫度              //*[@id="rso"]/div[1]/div/divD/div[1]/div/div/div/div[2]/div[1]/div/g-expandable-container/div/div[1]/g-expandable-content[2]/span/div[1]/div[2]/span/div/span[2]/span
                test = selector.xpath('//*[@id="rso"]/div[1]/div/div/div/div[1]/div/div/div/div[2]/div[1]/div/g-expandable-container/div/div[1]/g-expandable-content[2]/span/div[' + str(j) + ']/div[2]/span/div/span[2]/span/text()')
                print(test)
                test = test[0].split(" /")[0]
                Hightlist.append(test)
                # 平均低溫
                test = selector.xpath('//*[@id="rso"]/div[1]/div/div/div/div[1]/div/div/div/div[2]/div[1]/div/g-expandable-container/div/div[1]/g-expandable-content[2]/span/div[' + str(j) + ']/div[2]/span/div/span[2]/span/text()')
                test = test[0].split("/ ")[1]
                Lowlist.append(test)
            
        elif result[i][2] == "全區":
            # 訪問 各地區平均月均溫
            # 獲取頁面原始碼
            broswer.get('https://www.google.com/search?rlz=1C1GCEU_zh-TWTW909TW909&ei=W5yGX5mWNNXT-gT53IKIAw&q=' + result[i][1] + '+' + '平均月均溫' + '&oq=' + result[i][1] + '+' + '平均月均溫' + '&gs_lcp=CgZwc3ktYWIQAzoFCAAQsAM6BQgAEM0CUJSJX1jkol9g5KVfaAJwAHgBgAGuAYgBnRKSAQQwLjE2mAEAoAEBqgEHZ3dzLXdpesgBAcABAQ&sclient=psy-ab&ved=0ahUKEwjZr-L6u7PsAhXVqZ4KHXmuADEQ4dUDCA0&uact=5')
            selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
            for j in range(1,13,1):
                # 平均溫度
                test = selector.xpath('//*[@id="rso"]/div[1]/div/div/div/div[1]/div/div/div/div[2]/div[1]/div/g-expandable-container/div/div[1]/g-expandable-content[2]/span/div[' + str(j) + ']/div[2]/span/div/span[2]/span/text()')
                print(test)
                test = test[0].split(" /")[0]
                Hightlist.append(test)
                # 平均低溫
                test = selector.xpath('//*[@id="rso"]/div[1]/div/div/div/div[1]/div/div/div/div[2]/div[1]/div/g-expandable-container/div/div[1]/g-expandable-content[2]/span/div[' + str(j) + ']/div[2]/span/div/span[2]/span/text()')
                test = test[0].split("/ ")[1]
                Lowlist.append(test)

        else:
            # 訪問 各地區平均月均溫
            # 獲取頁面原始碼
            broswer.get('https://www.google.com/search?rlz=1C1GCEU_zh-TWTW909TW909&ei=W5yGX5mWNNXT-gT53IKIAw&q=' + result[i][1] + '+' +  result[i][2] + '平均月均溫' + '&oq=' + result[i][1] + '+' + result[i][2] + '平均月均溫' + '&gs_lcp=CgZwc3ktYWIQAzoFCAAQsAM6BQgAEM0CUJSJX1jkol9g5KVfaAJwAHgBgAGuAYgBnRKSAQQwLjE2mAEAoAEBqgEHZ3dzLXdpesgBAcABAQ&sclient=psy-ab&ved=0ahUKEwjZr-L6u7PsAhXVqZ4KHXmuADEQ4dUDCA0&uact=5')
            selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
            for j in range(1,13,1):
                # 平均溫度
                test = selector.xpath('//*[@id="rso"]/div[1]/div/div/div/div[1]/div/div/div/div[2]/div[1]/div/g-expandable-container/div/div[1]/g-expandable-content[2]/span/div[' + str(j) + ']/div[2]/span/div/span[2]/span/text()')
                print(test)
                test = test[0].split(" /")[0]
                Hightlist.append(test)
                # 平均低溫
                test = selector.xpath('//*[@id="rso"]/div[1]/div/div/div/div[1]/div/div/div/div[2]/div[1]/div/g-expandable-container/div/div[1]/g-expandable-content[2]/span/div[' + str(j) + ']/div[2]/span/div/span[2]/span/text()')
                test = test[0].split("/ ")[1]
                Lowlist.append(test)

        print(Hightlist)
        print(Lowlist)
        # 做陣列→字串的轉換 & 格式的調整
        Hightlist = str(Hightlist).strip("[]").replace("'","").replace("°","").replace(" ","")
        Lowlist = str(Lowlist).strip("[]").replace("'","").replace("°","").replace(" ","")
        
        cursor.execute(commandHigh, (Hightlist,result[i][0]))            # 將 高溫 寫入資料庫
        cursor.execute(commandLow, (Lowlist,result[i][0]))             # 將 低溫 寫入資料庫
        
        #儲存變更
        conn.commit()
        
        #關閉
        broswer.close()
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

    commandSunShine = "UPDATE regionalwindspeeds SET monthSunShine = %s WHERE PostalCode = %s"    # 尋找 取代 哪個 郵遞區號的 日照時數
    commandGloblRad = "UPDATE regionalwindspeeds SET monthGloblRad = %s WHERE PostalCode = %s"      # 尋找 取代 哪個 郵遞區號的 全天空日射量

    before = 0
    test = ""
    SunShinelist = []
    GloblRadlist = []

    for i in range(0,len(result),1):
        # print(result[i][0])
        # print(result[i][1])
        # print(result[i][2])
        if i==0:
            before = 0
        
        print("編號 :")
        print(i)
        print("郵遞區號:")
        print(result[i][0])
        print("縣市:" + result[i][1])
        # 紀錄這次的縣市
        now = result[i][1]

        # 判斷 上次的縣市 與 這次的縣市 是否相同，如果相同 值將直接寫入資料庫
        if now == before:
            print("日照量")
            print(SunShinelist)
            print("全天空日射量")
            print(GloblRadlist)
            
            cursor.execute(commandSunShine, (SunShinelist,result[i][0]))            # 將 日照量 寫入資料庫
            cursor.execute(commandGloblRad, (GloblRadlist,result[i][0]))             # 將 全天空日射量 寫入資料庫
            
            print("縣市 :  " + result[i][1] + "  寫入成功")
        else:
            broswer = webdriver.Chrome()
            test = ""
            SunShinelist = []
            GloblRadlist = []
            year = 2020

            if result[i][1] == "台北市":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=466920&stname=%25E8%2587%25BA%25E5%258C%2597&datepicker=' + str(year))
                # broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=466920&stname=%25E8%2587%25BA%25E5%258C%2597&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)
                
            elif result[i][1] == "基隆市":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=466940&stname=%25E5%259F%25BA%25E9%259A%2586&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)

            elif result[i][1] == "彭佳嶼":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=466950&stname=%25E5%25BD%25AD%25E4%25BD%25B3%25E5%25B6%25BC&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)

            elif result[i][1] == "新北市":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=466880&stname=%25E6%259D%25BF%25E6%25A9%258B&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)
            
            elif result[i][1] == "馬祖":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=467990&stname=%25E9%25A6%25AC%25E7%25A5%2596&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)

            elif result[i][1] == "宜蘭縣":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=467080&stname=%25E5%25AE%259C%25E8%2598%25AD&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)

            elif result[i][1] == "新竹縣" or result[i][1] == "新竹市" or result[i][1] == "苗栗縣":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=467571&stname=%25E6%2596%25B0%25E7%25AB%25B9&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)
            
            elif result[i][1] == "桃園市":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=467050&stname=%25E6%2596%25B0%25E5%25B1%258B&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)
            
            elif result[i][1] == "雲林縣" or result[i][1] == "嘉義市" or result[i][1] == "嘉義縣":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=467480&stname=%25E5%2598%2589%25E7%25BE%25A9&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)

            elif result[i][1] == "台中市" or result[i][1] == "彰化縣":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=467490&stname=%25E8%2587%25BA%25E4%25B8%25AD&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)

            elif result[i][1] == "南投縣":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=467650&stname=%25E6%2597%25A5%25E6%259C%2588%25E6%25BD%25AD&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)

            elif result[i][1] == "台南市":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=467410&stname=%25E8%2587%25BA%25E5%258D%2597&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)

            elif result[i][1] == "高雄市":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=467440&stname=%25E9%25AB%2598%25E9%259B%2584&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)

            elif result[i][1] == "澎湖":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=467350&stname=%25E6%25BE%258E%25E6%25B9%2596&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)

            elif result[i][1] == "東吉島":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=467300&stname=%25E6%259D%25B1%25E5%2590%2589%25E5%25B3%25B6&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)

            elif result[i][1] == "金門":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=467110&stname=%25E9%2587%2591%25E9%2596%2580&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)

            elif result[i][1] == "屏東縣" or result[i][1] == "琉球":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=467590&stname=%25E6%2581%2586%25E6%2598%25A5&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)
                
            elif result[i][1] == "台東縣" or result[i][1] == "綠島":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=467660&stname=%25E8%2587%25BA%25E6%259D%25B1&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)

            elif result[i][1] == "蘭嶼":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=467620&stname=%25E8%2598%25AD%25E5%25B6%25BC&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)
            
            elif result[i][1] == "花蓮縣":
                # 訪問 各地區平均月均溫
                # 獲取頁面原始碼
                broswer.get('https://e-service.cwb.gov.tw/HistoryDataQuery/YearDataController.do?command=viewMain&station=466990&stname=%25E8%258A%25B1%25E8%2593%25AE&datepicker=' + str(year))
                selector = etree.HTML(broswer.page_source) # etree.HTML(取得網頁原始碼) 為 Python爬蟲套件
                # 確認地區
                print(selector.xpath('//*[@id="hea_t"]/table/tbody/tr/td[2]/text()'))
                for j in range(4,16,1):
                    # 抓取 平均月日照時數
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[30]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    SunShinelist.append(test)

                    # 抓取 平均月全天空日射量
                    test = selector.xpath('//*[@id="MyTable"]/tbody/tr[' + str(j) + ']/td[31]/text()')
                    # 把 \xa0 取代掉  \xa0是HTML的空白
                    test = test[0].replace("\xa0","")
                    GloblRadlist.append(test)
                
            # 變更紀錄 將上次的縣市改為這次的縣市
            before = result[i][1]
            # 做陣列→字串的轉換 & 格式的調整
            SunShinelist = str(SunShinelist).strip("[]").replace("'","").replace(" ","")
            GloblRadlist = str(GloblRadlist).strip("[]").replace("'","").replace(" ","")
            print("日照量")
            print(SunShinelist)
            print("全天空日射量")
            print(GloblRadlist)
            
            cursor.execute(commandSunShine, (SunShinelist,result[i][0]))            # 將 日照量 寫入資料庫
            cursor.execute(commandGloblRad, (GloblRadlist,result[i][0]))             # 將 全天空日射量 寫入資料庫
            
            print("縣市 :  " + result[i][1] + "  寫入成功")
            
            #關閉
            broswer.close()

        #儲存變更
        conn.commit()
        
        
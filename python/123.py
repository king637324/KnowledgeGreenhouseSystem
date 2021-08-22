import PyPDF2 as pdf
# 記得 pip install PyPDF2

file = open('D:\\金屬中心(宜靜的)\\溫室資料\\12345.pdf','rb')

pdf_reader = pdf.PdfFileReader(file)

print(pdf_reader.getNumPages())  #讀取檔案頁數

page1 = pdf_reader.getPage(0)   #讀取檔案第1頁文字
print(page1)


print(page1.extractText())
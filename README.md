# Daily Vocabulary

---
## File Stucture
```plaintext
 .
 |
 |- css/
 |- image/
 |- js/
 |- manage/
 |   +- lib/
 +- index.html
```
- `manage` -> 所有後台管理介面 (HTML)
	- `lib` -> 後台管理相關功能 (PHP)
- `js` -> 所有 JavaScript 檔案
- `css` -> 所有 CSS 檔案
- `image` -> 所有圖檔
- `index.html` -> 每日單字介面

## Commit Message
- `[+]` -> 新增
- `[!]` -> 更新
- `[-]` -> 刪除
- `[~]` -> 重新命名

e.g.
```bash
# 新增一個名為「Hello.html」的檔案
git commit -m "[+] Hello.html"

# 更新「Hello.html」的功能
git commit -m "[!] Hello.html -> <一些描述>"

# 刪除「Hello.html」
git commit -m "[-] Hello.html"

# 重新命名「Hello.html」為「hello.html」
git commit -m "[~] Hello.html -> hello.html"
```


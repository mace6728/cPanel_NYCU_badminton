建議目錄結構
project/
├─ config/
│ ├─ app.php
│ ├─ db.php
│ └─ constants.php
│
├─ src/
│ ├─ Database.php
│ ├─ Auth.php
│ ├─ Services/
│ │ ├─ UserService.php
│ │ ├─ ArticleService.php
│ │ └─ AuthService.php
│ └─ Helpers/
# 建議目錄結構

若移除使用者管理、登入與權限驗證，第一版可以只保留網站頁面、文章功能和共用基礎程式：

```text
project/
├── config/
│   ├── app.php
│   └── db.php
├── src/
│   ├── Database.php
│   ├── Services/
│   │   └── ArticleService.php
│   └── Helpers/
│       ├── sanitize.php
│       └── response.php
├── public/
│   ├── index.php
│   ├── allposts.php
│   ├── contact.php
│   ├── gallery.php
│   ├── admin/
│   │   ├── administrator.php
│   │   ├── articleToDB.php
│   │   ├── articleUpdate.php
│   │   └── deleteArticle.php
│   └── assets/
│       ├── css/
│       ├── js/
│       ├── fonts/
│       └── img/
├── templates/
│   ├── partials/
│   │   ├── header.php
│   │   ├── footer.php
│   │   └── navbar.php
│   └── pages/
│       ├── home.php
│       └── articles.php
├── tests/
├── .env.example
├── composer.json
└── README.md
```

`vendor/` 由 Composer 安裝相依套件時產生，不必手動建立或提交至版本控制。

## 調整原則

### 移除使用者與驗證功能

- 不建立 `UserService.php`、`AuthService.php` 或 `Auth.php`。
- 若確定不再提供帳號功能，再移除登入、註冊、登出頁面，以及只服務於帳號審核的端點與模板。
- 不需要為了保留原有分層而建立空的 Service；保留仍有實際用途的文章與共用功能即可。

### 保留文章與資料庫職責

- `config/db.php` 集中讀取資料庫設定；敏感值放在環境變數，不要寫入程式碼或提交 `.env`。
- `src/Database.php` 負責建立 PDO 連線。
- `src/Services/ArticleService.php` 集中處理文章讀取、建立、更新與刪除。
- `src/Helpers/` 放跨頁面共用的輸入處理與回應工具，不放特定頁面的業務流程。

### 管理端安全

移除網站登入驗證後，`public/admin/` 下的管理頁面與寫入端點可能變成任何人都能呼叫。若仍要保留文章管理功能，部署前必須先用 cPanel／Apache 設定 IP allowlist、HTTP Basic Authentication 等存取限制；否則應停用或移除管理端寫入功能。不能只因登入頁已停用，就假設管理端已受到保護。

## cPanel 漸進式搬移

目前網站以專案根目錄作為公開根目錄，既有網址也依賴檔案原路徑。因此上面的 `public/` 是整理後的目標，不建議一次搬動所有頁面與資源。先整理資料庫連線和文章邏輯，再透過 cPanel 文件根目錄或 URL rewrite 規劃相容性，逐批搬移並確認舊網址仍可用。

第一階段可先採用以下邏輯分層，不必立即改變公開路徑：

```text
config/
src/
templates/
```

頁面共用的 header、footer 與 navbar 可逐步抽到 `templates/partials/`；確認 URL rewrite、資源路徑與部署流程後，再考慮將公開入口移至 `public/`。
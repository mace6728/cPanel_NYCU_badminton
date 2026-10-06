<!DOCTYPE html>
<html lang="zh-tw" class="mdl-js">

<head>

    <meta charset="utf-8">
    <title>交大羽球隊後台管理</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/material.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' >
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.min.js"></script>
    <link rel="stylesheet" href="../css/administrator.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/jquery.js"></script>
    
    <!--<script type="text/javascript">-->
    <!--    $(document).ready(function(){-->
    <!--        $("$edit_s").on("change",function(){-->
                
    <!--            document.getElementById("e_newest").removeAttribute("checked");-->
    <!--            document.getElementById("e_newest").checked = false;-->
                
    <!--            document.getElementById("e_activity").setAttribute("checked", "checked");-->
    <!--            document.getElementById("e_activity").checked = true;-->
    <!--        });-->
    <!--    });-->
    <!--</script>-->
    
    <script>
            
    
    function edit_check()
    {  
        var select_op=document.getElementById("edit_s").value;
        
        var xmlHTTP1 = new XMLHttpRequest();
        var url1     = "edit_heading.php";
        var params1  = "select_op=" + select_op;
        xmlHTTP1.open("POST", url1, true);
        
        xmlHTTP1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHTTP1.onreadystatechange = function (){
            
            if(xmlHTTP1.readyState == 4 && xmlHTTP1.status == 200){

                document.getElementById("e_heading").value = xmlHTTP1.responseText;
            }
        }
        xmlHTTP1.send(params1);
        
        var xmlHTTP2 = new XMLHttpRequest();
        var url2     = "edit_date.php";
        var params2  = "select_op=" + select_op;
        xmlHTTP2.open("POST", url2, true);
        
        xmlHTTP2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHTTP2.onreadystatechange = function (){
            
            if(xmlHTTP2.readyState == 4 && xmlHTTP2.status == 200){

                document.getElementById("e_time").value = xmlHTTP2.responseText;
            }
        }
        xmlHTTP2.send(params2);
        
        var xmlHTTP3 = new XMLHttpRequest();
        var url3     = "edit_text.php";
        var params3  = "select_op=" + select_op;
        xmlHTTP3.open("POST", url3, true);
        
        xmlHTTP3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHTTP3.onreadystatechange = function (){
            
            if(xmlHTTP3.readyState == 4 && xmlHTTP3.status == 200){

                tinyMCE.activeEditor.setContent(xmlHTTP3.responseText);
            }
        }
        xmlHTTP3.send(params3);
        
    }
    </script>

  <script>
    function pst(){
        document.getElementById("post").style.display="block";
        document.getElementById("edit").style.display="none";
        document.getElementById("delete").style.display="none";

    }
    function edt(){
        document.getElementById("post").style.display="none";
        document.getElementById("edit").style.display="block";
        document.getElementById("delete").style.display="none";

    }
    function del(){
        document.getElementById("post").style.display="none";
        document.getElementById("edit").style.display="none";
        document.getElementById("delete").style.display="block";

    }
    // --- 修改後的發表新文章函數 ---
    function newArticle() {
        var e = document.getElementById("heading").value,
            t = document.getElementById("time").value,
            rawContent = tinyMCE.activeEditor.getContent().toString(),
            c = "";
        
        // 使用 Base64 編碼處理內容
        var base64Content = btoa(unescape(encodeURIComponent(rawContent)));
    
        // 檢查標題與「原始內容」是否為空
        if (e.length < 1 || rawContent.length < 1) {
            document.getElementById("sthEmpty").style.display = "block", 
            setTimeout('document.getElementById("sthEmpty").style.display="none"', 3e3);
        } else {
            document.getElementById("newest").checked && (c = categoryDecider(0));
            document.getElementById("end").checked && (c = categoryDecider(1));
            document.getElementById("competition").checked && (c = categoryDecider(2));
            document.getElementById("activity").checked && (c = categoryDecider(3));
    
            // 注意：這裡傳送的是 base64Content
            $.post("articleToDB.php", { category: c, heading: e, content: base64Content, time: t }, function(res) {
                if (res.trim() == "success") {
                    document.getElementById("successArticle").style.display = "block";
                    setTimeout(function(){ location.reload(); }, 1500);
                } else {
                    alert("伺服器回傳：" + res);
                }
            });
        }
    }
    
    function updateArticle() {
        var e = document.getElementById("e_heading").value,
            t = document.getElementById("e_time").value,
            rawContent = tinyMCE.activeEditor.getContent().toString(),
            c = "",
            tt = document.getElementById("edit_s").value;
    
        // 更新也要用 Base64！
        var base64Content = btoa(unescape(encodeURIComponent(rawContent)));
    
        if (e.length < 1 || rawContent.length < 1) {
            document.getElementById("e_sthEmpty").style.display = "block", 
            setTimeout('document.getElementById("e_sthEmpty").style.display="none"', 3e3);
        } else {
            document.getElementById("e_newest").checked && (c = categoryDecider(0));
            document.getElementById("e_end").checked && (c = categoryDecider(1));
            document.getElementById("e_competition").checked && (c = categoryDecider(2));
            document.getElementById("e_activity").checked && (c = categoryDecider(3));
    
            $.post("articleUpdate.php", { category: c, heading: e, content: base64Content, time: t, timer: tt }, function(res) {
                if (res.trim() == "success") {
                    document.getElementById("e_successArticle").style.display = "block";
                    setTimeout(function(){ location.reload(); }, 1500);
                }
            });
        }
    }
    
    function categoryDecider(e){switch(e){case 0:return"一般消息";case 1:return"比賽成果";case 2:return"競賽資訊";case 3:return"球隊活動"}}
    function getCategoryByText(e){
        if(e=="一般消息") return "newest";
        else if(e=="比賽成果") return "end";
        else if(e=="競賽資訊") return "competition";
        else if(e=="球隊活動") return "activity";
    }
    function deleteArticle() {
        var selectedRows = $("#delete .is-selected"); // 縮小範圍到刪除區塊
        
        if (selectedRows.length === 0) {
            alert("請先點擊要刪除的文章列（選中後會變色）！");
            return;
        }
    
        if (!confirm("確定要刪除選中的 " + selectedRows.length + " 篇文章嗎？")) return;
    
        selectedRows.each(function() {
            var e = $(this).attr("id"); // 這裡就是你的 timer ID
            var row = $(this);
    
            $.post("deleteArticle.php", { timer: e }, function(t) {
                console.log("刪除回傳：", t);
                if (t.trim() == "success") {
                    // UI 表現：變灰色並加刪除線
                    row.removeClass("is-selected");
                    row.css("color", "#9E9E9E");
                    row.find("td").css("text-decoration", "line-through");
                    row.children().first().html("已刪除");
                }
            });
        });
    }
    </script>
    
        <script async src="../tinymce/js/tinymce/tinymce.min.js"></script>

    <style>
        /* 當列被選中時，背景變色 */
        .is-selected {
            background-color: #e0f2f1 !important; /* 淺綠色 */
        }
    </style>

</head>

<body>

<div class="mdl-layout__container">
<!--remove mdl-js-layout?-->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-drawer"  id="content">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <span class="mdl-layout-title">主控台內容</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. 
      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a class="mdl-navigation__link" href="">Link</a>
      </nav>
      -->
    </div>
  </header>

  <div class="mdl-layout__drawer  mdl-color--white" id="drawer">
    <span class="mdl-layout-title">主控台選項</span>
    <nav class="mdl-navigation">
      <div>
        <a href="#"><img src="../img/test.svg"/></a>
        <div id="admin">管理員</div>
      </div>
      <a class="mdl-navigation__link" href="#post" onclick="pst();" ><div class="material-icons">create</div>發表文章</a>
      <a class="mdl-navigation__link" href="#edit" onclick="edt();"><div class="material-icons">edit</div>編輯文章</a>
      <a class="mdl-navigation__link" href="#delete" onclick="del();" ><div class="material-icons">delete</div>刪除文章</a>
    </nav>
  </div>

  <main class="mdl-layout__content mdl-color--grey-100" ";>
    <div class="mdl-grid page-content">
        <div id="post" class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <h4 class="mdl-cell mdl-cell--12-col">類別</h4>
            <label class="mdl-cell mdl-cell--2-col mdl-radio mdl-js-radio mdl-js-ripple-effect" for="newest">
                <input type="radio" id="newest" class="mdl-radio__button" name="options" checked />
                <span class="mdl-radio__label">一般消息</span>
            </label>
            <label class="mdl-cell mdl-cell--2-col mdl-radio mdl-js-radio mdl-js-ripple-effect" for="end">
                <input type="radio" id="end" class="mdl-radio__button" name="options"/>
                <span class="mdl-radio__label">比賽成果</span>
            </label>
            <label class="mdl-cell mdl-cell--2-col mdl-radio mdl-js-radio mdl-js-ripple-effect" for="competition">
                <input type="radio" id="competition" class="mdl-radio__button" name="options"/>
                <span class="mdl-radio__label">競賽資訊</span>
            </label>
            <label class="mdl-cell mdl-cell--2-col mdl-radio mdl-js-radio mdl-js-ripple-effect" for="activity">
                <input type="radio" id="activity" class="mdl-radio__button" name="options"/>
                <span class="mdl-radio__label">球隊活動</span>
            </label>
            <h4 class="mdl-cell mdl-cell--12-col">標題</h4>
            <input type="text" class="mdl-cell mdl-cell--12-col" id="heading" placeholder="輸入標題">
            <h4 class="mdl-cell mdl-cell--12-col">時間</h4>
            <input type="text" class="mdl-cell mdl-cell--12-col" id="time" placeholder="yyyy-mm-dd,2016-01-01">
            <h4 class="mdl-cell mdl-cell--12-col">內文</h4>
            <textarea id = post_text></textarea>
            <button class="mdl-cell mdl-cell--10-offset mdl-cell--2-col" onclick="newArticle()">發表</button>
            <div id="sthEmpty"><strong>標題與內文不能為空！</strong></div>
            <div id="successArticle"><strong>發表成功！</strong></div>
            <div id="failArticle"><strong>發表失敗！</strong></div>
        </div>

        <div id="edit" class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <h4 class="mdl-cell mdl-cell--12-col">選擇要修改的文章標題</h4>
            <div>
                <?php
                    require_once __DIR__ . '/../config/db.php';

                    $sql="SELECT * FROM `article` ORDER BY `date` DESC";
                    $sth = $db->prepare($sql);
                    $sth->execute();
                    echo '<select id = "edit_s" onChange="updateArticleHtml(this)";>';
                    while($row = $sth->fetch()){
                         echo "<option value = ".$row['timer'].">";
                        echo $row['heading'];
                        echo "</option>";
                    }
                    echo "</select>";
                ?>
            </div>
            </br>
            <h4 class="mdl-cell mdl-cell--12-col">新類別</h4>
            <label class="mdl-cell mdl-cell--2-col mdl-radio mdl-js-radio mdl-js-ripple-effect" for="e_newest">
                <input type="radio" id="e_newest" class="mdl-radio__button" name="e_options" />
                <span class="mdl-radio__label">一般消息</span>
            </label>
            <label class="mdl-cell mdl-cell--2-col mdl-radio mdl-js-radio mdl-js-ripple-effect" for="e_end">
                <input type="radio" id="e_end" class="mdl-radio__button" name="e_options"/>
                <span class="mdl-radio__label">比賽成果</span>
            </label>
            <label class="mdl-cell mdl-cell--2-col mdl-radio mdl-js-radio mdl-js-ripple-effect" for="e_competition">
                <input type="radio" id="e_competition" class="mdl-radio__button" name="e_options"/>
                <span class="mdl-radio__label">競賽資訊</span>
            </label>
            <label class="mdl-cell mdl-cell--2-col mdl-radio mdl-js-radio mdl-js-ripple-effect" for="e_activity">
                <input type="radio" id="e_activity" class="mdl-radio__button" name="e_options"/>
                <span class="mdl-radio__label">球隊活動</span>
            </label>
            <h4 class="mdl-cell mdl-cell--12-col">新標題</h4>
            <input type="text" class="mdl-cell mdl-cell--12-col" id="e_heading">
            <h4 class="mdl-cell mdl-cell--12-col">新時間</h4>
            <input type="text" class="mdl-cell mdl-cell--12-col" id="e_time" >
            <h4 class="mdl-cell mdl-cell--12-col">新內文</h4>
            <textarea id = "edit_text"></textarea>
            <button class="mdl-cell mdl-cell--10-offset mdl-cell--2-col" onclick="updateArticle()">修改</button>
            <div id="e_sthEmpty"><strong>標題與內文不能為空！</strong></div>
            <div id="e_successArticle"><strong>發表成功！</strong></div>
            <div id="e_failArticle"><strong>發表失敗！</strong></div>

        </div>
        <div id="delete" class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <h4 class="mdl-cell mdl-cell--12-col">刪除文章</h2>
          <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
            <thead>
              <tr>
                <th class="mdl-data-table__cell--non-numeric">類別</th>
                <th class="mdl-data-table__cell--non-numeric">標題</th>
                <th class="mdl-data-table__cell--non-numeric">日期</th>
              </tr>
            </thead>
            <tbody>
              <?php
                require_once __DIR__ . '/../config/db.php';

                $sql = "SELECT * FROM `article` ORDER BY `timer` DESC";
                $sth = $db->prepare($sql);
                $sth->execute();
                while($row = $sth->fetch()){
                    echo '<tr id="'.$row[4].'"><td class="mdl-data-table__cell--non-numeric">'.$row[0].'</td><td class="mdl-data-table__cell--non-numeric">'.$row[1].'</td><td class="mdl-data-table__cell--non-numeric">'.$row[3].'</td></tr>';
                }
              ?>
            </tbody>
          </table>
          <button class="mdl-cell mdl-cell--10-offset mdl-cell--2-col" onclick="deleteArticle()">刪除</button>
        </div>
    </div>
  </main>



</div>
  <script>
      function hideDrawer(){document.getElementById("drawer").className="mdl-layout__drawer mdl-color--white"};
     
    let e_heading = document.querySelector("#e_heading")
    let e_time = document.querySelector("#e_time")
    let textArea = document.querySelector("#edit_text")
    async function fetchArticle(id) {
        const res = await fetch(`/api/event.php?id=${id}`);
        data = await res.json()
        return data
     }
     async function updateArticleHtml(article) {
        const data = await fetchArticle(article.value)
        const category = document.querySelector(`#e_${getCategoryByText(data['category'])}`)
        //console.log(category)
        //console.log(category.checked)
        //category.checked = true
        //category.setAttribute('checked', 'checked')
        category.click()
        //console.log(category)
        //console.log(category.checked)
        tinyMCE.activeEditor.setContent(data['content'])
        //textArea.value = data['content']
        //console.log(tinyMCE.activeEditor.getContent())
        e_heading.value=data['heading']
        e_time.value=data['date']
     }
     
     // 等待文件載入完成
    $(document).ready(function() {
        // 監聽刪除表格內 tr 的點擊事件
        $(document).on('click', '#delete tbody tr', function() {
            // 切換 .is-selected 類別
            $(this).toggleClass('is-selected');
            console.log("目前的選取狀態：", $(this).attr('id'), $(this).hasClass('is-selected'));
        });
    });
  </script>
</div>


</body>



</html>
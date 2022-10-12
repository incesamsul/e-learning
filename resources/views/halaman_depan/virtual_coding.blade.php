<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}


.btn {
  poistion:fixed;
  right:0;
   padding: 0.4rem;
  width: 4rem;
  background:#366cb6;
  color: gold;
  font-size: 1rem;
  outline:none;
  cursor:pointer;
   height:90vh;
   border: none;
}
.btn:hover{
   color:white;
   background: #0b2346;
}


.main-editor {
  background: #1D519B;
  display: flex;
  width: 100%;
  padding: 1rem;
  box-shadow:0 2px 3px #1D519B;
  position:fixed;
  height:100vh;
   justify-content: center;
    align-items: center;
  border: 7px solid #071f3f;
}

.first {
  background-color: #ffffff;
  width: 50%;
  overflow-x: hidden;
  overflow-y: auto;
  white-space: pre;
  box-shadow: 0 1px 1px #1D519B;
  outline: none;
  padding: 0.4rem;
  height: 90vh;
}

.second {
  background-color: rgb(255, 255, 255);
  width: 50%;
  overflow-y: auto;
  white-space: pre;
  right: 0;
  box-shadow: 0 1px 1px #1D519B;
  padding: 0.4rem;
  height: 90vh;
}
    </style>
    <title>Html editor</title>
</head>
<body>
    <div class="main-editor">
        <button id="kembali" class="btn"><<</button>
        <button class="btn">Run</button>
        <div class="first" contenteditable>
            Tulis kode disini
        </div>
        <iframe class="second">
        </iframe>
    </div>

    <script>
        const first = document.querySelector(".first");
        const iframe = document.querySelector("iframe");
        const btn = document.querySelector("button");
        const kembali = document.querySelector("#kembali");

        kembali.addEventListener('click',()=>{
            document.location.href = '/materi/' + '{{ $id_pelajaran }}';
        })
        btn.addEventListener("click", () => {
        var html = first.textContent;
        iframe.src = "data:text/html;charset=utf-8," + encodeURI(html);
        });


        first.addEventListener('keyup',()=>{
        var html = first.textContent;
        iframe.src = "data:text/html;charset=utf-8," + encodeURI(html);
        })

        first.addEventListener("paste", function(e) {
                e.preventDefault();
                var text = e.clipboardData.getData("text/plain");
                document.execCommand("insertText", false, text);
            });
    </script>
</body>
</html>

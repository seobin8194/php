<!-- 
    ajax(Asynchronous Javascript and XML)
    자바스크립트가 비동기식으로 서버와 연동(통신)
    보통 웹은 페이지를 이동해서 작업처리(ok.php)하는데 ajax는 웹 페이지 전체를 다시 로딩하지 않고 웹 페이지의 일부만 갱신 가능
    ajax는 백그라운드 영역에서 서버와 통신하여 그 결과를 웹 페이지 일부에 표시
    
    * XML 
      사용자 정의 마크업 언어
      사용자가 태그를 만들어서 사용하고 다른 언어(자바, c, ..)로 기능을 줌
    
    ajax의 장점
    - 웹 페이지 전체를 다시 로딩하지 않고도 웹 페이지의 일부분만 갱신할 수 있다
    - 웹 페이지가 로드된 후에 페이지 이동없이 서버로 데이터 요청을 보낼 수 있다
    - 웹 페이지가 로드된 후에 서버로부터 데이터를 받을 수 있다
    - 백그라운드 영역에서 서버로 데이터를 보낼 수 있다

    ajax의 단점
    - 클라이언트가 서버에 데이터를 요청하는 "클라이언트 풀링"방식을 사용하므로
      "서버 푸시"방식의 실시간 서비스를 만들 수 없다(웹의 단점이기도 함)
      * 클라이언트 풀링
        클라이언트가 서버에게 요청한 후 서버가 응답
      * 서버 푸시
        클라이언트가 요청하기 전에 서버에서 데이터가 날라옴 (카카오톡)
    - ajax로는 바이너리 데이터를 보내거나 받을 수 없다. 즉 문자 데이터만 주고받을 수 있다
    - ajax 스크립트가 포함된 서버가 아닌 다른 서버로 ajax요청을 보낼 수 없다

    XMLHttpRequest(XHR)
    자바스크립트의 객체이며 이 객체를 이용하여 ajax를 사용
    Ajax의 가장 핵심적인 구성요소
    웹 브라우저가 서버와 데이터를 교환할때 사용
    웹 브라우저가 계속해서 서버와 통신할 수 있는 것은 이 객체를 사용하기 때문이다
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <script>
        function sendRequest(){
            const httpRequest = new XMLHttpRequest();
            //onreadystatechange : 상태값이 바뀌면 실행되는 함수
            //onreadystate
            //1. UNSENT (0) : XMLHttpRequest 객체 생성됨
            //2. OPENED (1) : open()메소드가 성공적으로 실행됨
            //3. HEADERS_RECEIVED (2) : 모든 요청에 대한 응답이 도착함
            //4. LOADING (3) : 요청한 데이터 처리 중
            //5. DONE (4) : 요청한 데이터의 처리가 완료되어 응답할 준비가 완료됨
            httpRequest.onreadystatechange = function(){
                //ajax 통신이 제대로 이루어졌을때
                if(httpRequest.readyState == XMLHttpRequest.DONE && httpRequest.status == 200){
                  //httpRequest.responseText: 서버에서 전달한 데이터
                    document.getElementById("text").innerHTML = httpRequest.responseText;
                }
            };
            //open("전송방식", "URL주소", 동기여부) : 서버로 보낼 ajax요청의 형식을 설정
            //  전달방식 : get, post 방식 중 하나를 선택
            //  url : 요청을 처리할 서버의 파일주소를 전달
            //  동기여부 : 동기식, 비동기식으로 전달할지 결정 (true -> 비동기식)
            httpRequest.open("GET", "10_ajax_ok.php?userid=apple&userpw=1111", true);

            //send() : 작성된 ajax요청을 서버로 전달
            //send() : get방식, send(문자열) : post방식
            httpRequest.send();
        }
     </script>
 </head>
 <body>
     <p>get 방식으로 요청 : <input type="button" value="요청" onclick="sendRequest()"></p>
     <p id="text"></p>
 </body>
 </html>
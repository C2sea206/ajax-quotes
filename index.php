<html>
  <head>
    <title>AJAX Quotes</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Tulpen+One&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Qwitcher+Grypen:wght@700&display=swap');        
      
      
      /* CSS to hide the quote container initially and apply fade-in animation */
        #quoteContainer {
            display: none;
           font-size:xx-large;
            text-shadow: 4px 4px 4px #aaa;
        }


        /* CSS for the fade-in animation */
        .fade-in {
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

    </style>
  </head>
  <body>
    <h1>AJAX Quotes</h1>
    <p>Below is where JavaScript code fetches random quotes from a server using AJAX requests and displays them on a webpage. It cycles through a set of fonts for each quote and adds a fade-in effect. The `getRandomQuote` function sends requests to 'random_quotes.php', displays the quote with changing fonts, and handles errors. The `displayRandomQuote` function initializes quote display and sets an interval for automatic refreshing every 5 seconds. The code ensures a dynamic and visually appealing presentation of random quotes on the webpage. 
    </p>
  
    <div id="quoteContainer">Quotes go here</div>
    <script>

      //helps us loop the array of fonts
      var counter = 0;
      
      function getRandomQuote(){

        var fonts = ["Shadows Into Light","Tulpen One","Qwitcher Grypen"];
        //create ajax object
        var xhr = new XMLHttpRequest();

        //target the server page
        xhr.open('GET','random_quotes.php',true);

        //if data comes back, show it here
        xhr.onload = function(){
            if(xhr.status >= 200 && xhr.status < 300){//all ok, show data
              //document.querySelector("#quoteContainer").innerText = xhr.responseText;
              var quoteContainer = document.querySelector("#quoteContainer");

              //retrieve text from php page
              quoteContainer.innerText = xhr.responseText;

              //add font family
              quoteContainer.style.fontFamily = fonts[counter];
              counter++;
              if(counter >= fonts.length){
                counter = 0;
              }
              //make element visible
              quoteContainer.style.display = "block";

              //add fade in class
              quoteContainer.classList.add("fade-in");

              setTimeout(function(){
                quoteContainer.classList.remove("fade-in");
              },1000);
              
            }else{//show error
              document.querySelector("#quoteContainer").innerText = "Failed to fetch quote: " + xhr.status;
            }
        };

        //if trouble, investigate here
        xhr.onerror = function(){
          alert("Oh oh! We received an XHR error!");
        };

        //send data to server
        xhr.send();
        
      }

      function displayRandomQuote(){
          //retrieve quote
          getRandomQuote();

          //run every 5 seconds        
          setInterval(getRandomQuote,5000);
      }
      //run on page load
      displayRandomQuote();
    </script>
  </body>
</html>

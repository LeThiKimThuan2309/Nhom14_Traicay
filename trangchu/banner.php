<div class= "row">
                <div >
                    <img class="images animate-fading" src="../images/banner1.png"  >
                    <img class="images animate-fading" src="../images/banner.png" style="width:100%;height:400px;" > 
                </div>
                 <script>
                    var myIndex = 0;
                    carousel2();
                    
                    function carousel2() {
                    var i;
                    var x = document.getElementsByClassName("images");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";  
                    }
                    myIndex++;
                    if (myIndex > x.length) {myIndex = 1}    
                    x[myIndex-1].style.display = "block";  
                    setTimeout(carousel2, 4000);    
                    }
                </script>
    <div>
            <div>
                 <img  src="../images/anh3.png" alt="" style="width:100%;">
            </div>
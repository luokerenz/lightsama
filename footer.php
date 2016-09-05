<style>
        .wrapper{
            background-color: black; 
        }
        .fifth{
            order:5;
            display: flex;
            justify-content: space-around;
            flex-flow: row wrap;
            min-height: 150px;
        }
        .wrapper .logo{
            margin:auto;
        }
        .wrapper h3{           
            color: white;
            font-size: 30px;
        }
        .wrapper .despwrap{
            margin:auto;
        }
        .wrapper .despwrap h4{
            color: white;
            font-size: 25px;
            text-align: center;
        }
        .wrapper .despwrap p{
            color: white;
            font-size: 20px;
            margin-left: 0;
        }
        .wrapper .formwrap{
            margin:auto;           
        }
        .wrapper .formwrap a{
            color: white;
            font-size: 15px;
            margin-right: 0;
        }
</style>


<style>
    #status {
position:fixed;
top:50%;
left:50%;
z-index:100000;
width:150px;
height:150px;
margin:-75px 0 0 -75px;
background-color:rgba(0,0,0,0.7);
border-radius:150px;
font-size:30px;
line-height:150px;
font-weight:700;
color:#fff;
text-align:center;
cursor:default; }

</style>

<script>
    function LoadRequest(value){
        alert(value);
        $.ajax({
                type: 'GET',
                url: 'FavWrite.php',
                data: 'current_request=' + value,
                success: function() {
                
          }
          
            });
    }
</script>

<div class="wrapper">
        <div class="fifth">
            <div class="logo">
                <h3>HAILOINN</h3>
            </div>
            <div class="despwrap">
                <h4>About</h4>
                <p>Hailoinn is a website for picture indexing only</p>
            </div> 
            <div class="formwrap">
                <a href="#" onclick="LoadRequest('term')">term/privacy</a><br><br>
                <a href="#" onclick="LoadRequest('problem')">report a problem</a><br><br>
                <a href="#" onclick="LoadRequest('contact')">contact us</a>           
            </div>
        </div> 
</div>
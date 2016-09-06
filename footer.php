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
    #abc {     
        width:100%;
        height:200vh;
        opacity:.95;
        top:0;
        left:0;
        display:block;
        position:fixed;
        background-color:#313131;
        overflow:auto
    }
    #abc #close {
        position:absolute;
        right:-14px;
        top:-14px;
        cursor:pointer
    }
    #abc #popupContact {
        position:absolute;  
        left:50%;
        top:5%;
        margin-left:-202px;
        font-family:'Raleway',sans-serif
    }
    #abc form {
        width: 500px;
        padding:10px 50px;
        border:2px solid gray;
        border-radius:10px;
        font-family:raleway;
        background-color:#fff
    }
    #abc p {
        margin-top:30px
    }
    #abc h2 {
        background-color:#FEFFED;
        padding:20px 35px;
        margin:-10px -50px;
        text-align:center;
        border-radius:10px 10px 0 0
    }
    #abc hr {
        margin:10px -50px;
        border:0;
        border-top:1px solid #ccc
    }
    #abc input[type=text] {
        width:82%;
        padding:10px;
        margin-top:30px;
        border:1px solid #ccc;
        padding-left:40px;
        font-size:16px;
        font-family:raleway
    }
    #abc #name {
        background-image:url(/media/name.png);
        background-size: contain;
        background-repeat:no-repeat;
        background-position:0px 0px
    }
    #abc #email {
        background-image:url(/media/msg.png);
        background-size: 35px 37.1px;
        background-repeat:no-repeat;
        background-position:0px 0px
    }
    #abc textarea {
        background-image:url(/media/email.png);
        background-size: 37px 37px;
        background-repeat:no-repeat;
        background-position:0px 0px;
        width:82%;
        height:95px;
        padding:10px;
        resize:none;
        margin-top:30px;
        border:1px solid #ccc;
        padding-left:40px;
        font-size:16px;
        font-family:raleway;
        margin-bottom:30px
    }
    #abc #submit {
        text-decoration:none;
        width:100%;
        text-align:center;
        display:block;
        background-color:#FFBC00;
        color:#fff;
        border:1px solid #FFCB00;
        padding:10px 0;
        font-size:20px;
        cursor:pointer;
        border-radius:5px
    }
    #abc span {
        color:red;
        font-weight:700
    }
    #abc button {
        width:10%;
        height:45px;
        border-radius:3px;
        background-color:#cd853f;
        color:#fff;
        font-family:'Raleway',sans-serif;
        font-size:18px;
        cursor:pointer
    } 
</style>

<script>
    function FormLoad(value){
        $.ajax({
                type: 'GET',
                url: 'FavWrite.php',
                data: 'current_request=' + value,
                success: function(result){
                    result = result.replace(/&amp;/g, "&").replace(/&lt;/g, "<").replace(/&gt;/g, ">");
                    document.getElementById('topwrap').innerHTML = result;
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
                <a href="#" onclick="FormLoad('term')">term/privacy</a><br><br>
                <a href="#">report a problem</a><br><br>
                <a href="#">contact us</a>           
            </div>
        </div> 
</div>
<style>
    .panga_box{
        padding: 1rem 0 3rem 0;
    }
    .panga_title{
        font-family: 'Rowdies', cursive!important;
        font-size: 3rem;
        letter-spacing: 1px;
        text-align: center;
        color: #08415C;
    }
    .panga_title small{
        color: #8d99ae;
        line-height: 1;
        font-size: 1.8rem;
        position: relative;
        bottom: .8rem;
        left: -.2rem;
    }
    small.taxes{
        font-size: 12px;
        position: relative;
        bottom: 8px;
    }
    .boat_info_column{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .description_box{
        height: auto;
    }
    @media(min-width:1200px){
        .description_box{
            width: 100%
        }
        .panga_title{
            text-align: left;
        }
    }
    .panga_rates{
        width: 100%;
    }

    /* RATES */
    table {
        width: 100%!important;
        border-collapse: collapse;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
    th,
    td {
        padding: 10px;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 0px;
        color: #fff;
    }

    th {
        text-align: left;
    }
    thead th {
        background-color: #08415C;
    }
    tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.3);
    }
    tbody td {
        position: relative;
        color: #1b7482;
    }
    tbody td:hover:before {
        content: "";
        left: 0;
        right: 0;
        top: -9999px;
        bottom: -9999px;
        background-color: rgba(255, 255, 255, 0.2);
        z-index: -1;
    }
    .taxes{
        color: red;
    }
    .btn-book-now{
        width: 100%!important
    }
    .list-group-item{
        background-color: transparent!important;
    }
    .slider-for .slick-next{
        right: 10px;
    }
    .slider-for .slick-prev{
        position: absolute;
        left: 10px;
        z-index: 1000;
    }
    .charters-container{
            height: 80%;
        }
   @media(min-width:1024px){
        .charters-container{
            height: 95%;
        }
   }
    .charters-wrapper{
        overflow: hidden;
        position: -webkit-sticky;
        position: sticky;
        top: 0px;
        bottom: 0;
    }
    .m-none{
        display:none;
    }
    .m-button{
        max-width: 65px;
        background-color: #CC2936;
    }
    .m-text-head{
        font-size: 12px;
        padding: 0;
    }
    #boat_name{
        width: 85px!important;
    }
    @media(min-width: 1024px){
        .m-none{
            display:table-cell;
        }
        .m-button{
            max-width: 100%;
        }
        .m-text-head{
            font-size: inherit;
            padding: inherit;
        }
        #boat_name{
            width: 140px!important;
        }
    }
    
    .boat_title {
        font-family: 'Rowdies', cursive !important;
        font-size: 3rem;
        letter-spacing: 1px;
    }



    @media screen and (max-width: 400px) {
        #paypal-button-container {
            width: 100%;
        }
    }
    
    /* Media query for desktop viewport */
    @media screen and (min-width: 400px) {
        #paypal-button-container {
            width: 55%;
            margin: 0 auto;
        }
    }
    
    a.danger{
        color: red!important;
        font-weight: 700;
    }
    .fade-enter-active, .fade-leave-active {
        transition: opacity .8s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
    .required:after {
        content:" *";
        color: red;
        font-weight: 900;
    }
    .summary-title{
        font-size: 1.8rem;
        text-align: center;
        font-weight: 900;
    }
    .summary-content p{
        margin-bottom: 5px;
        line-height: 1.2;
    }
    .boat_name{
        font-size: 1.5rem;
        text-align: center;
        font-weight: 900;
        text-shadow: 1px 1px 3px rgba(20, 20, 20, 1);
    }
    .boat_name span{
        font-size: 1rem;
        text-align: center;
        color: #004085!important;
        text-shadow: none;
    }
    .thumbnail{
        border-radius: 10px;
    }

    .glyphicon{
        position:relative;
        top:1px;
        display:inline-block;
        font-family:'Glyphicons Halflings';
        -webkit-font-smoothing:antialiased;
        font-style:normal;
        font-weight:normal;
        line-height:1
    }
    .glyphicon-signal:before{
        content:"\e018"
    }
    .glyphicon-trash:before{
        content:"\e020"
    }
    .glyphicon-home:before{
        content:"\e021"
    }
    .glyphicon-time:before{
        content:"\e023"
    }
    .glyphicon-list-alt:before{
        content:"\e032"
    }
    .glyphicon-flag:before{
        content:"\e034"
    }
    .glyphicon-chevron-left:before{
        content:"\e079"
    }
    .glyphicon-chevron-right:before{
        content:"\e080"
    }
    .glyphicon-plus-sign:before{
        content:"\e081"
    }
    .glyphicon-minus-sign:before{
        content:"\e082"
    }
    .glyphicon-remove-sign:before{
        content:"\e083"
    }
    .glyphicon-ok-sign:before{
        content:"\e084"
    }
    .glyphicon-remove-circle:before{
        content:"\e088"
    }
    .glyphicon-ok-circle:before{
        content:"\e089"
    }
    .glyphicon-ban-circle:before{
        content:"\e090"
    }
    .glyphicon-arrow-left:before{
        content:"\e091"
    }
    .glyphicon-arrow-right:before{
        content:"\e092"
    }
    .glyphicon-arrow-up:before{
        content:"\e093"
    }
    .glyphicon-arrow-down:before{
        content:"\e094"
    }

    .glyphicon-chevron-up:before{
        content:"\e113"
    }
    .glyphicon-chevron-down:before{
        content:"\e114"
    }
    .glyphicon-calendar:before{
        content:"\1f4c5"
    }

</style>
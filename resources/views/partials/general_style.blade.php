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
            margin-bottom:2rem;
        }
    }
    .panga_title small {
        color: #8d99ae;
        line-height: 1;
        font-size: 1.8rem;
        position: relative;
        bottom: .8rem;
        left: -.2rem;
    }
    .panga_rates{
        width: 100%;
    }
    table {
        width: 800px;
        border-collapse: collapse;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    /* RATES */
    table {
        width: 800px;
        border-collapse: collapse;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
    th,
    td {
        padding: 15px;
        background-color: rgba(255, 255, 255, 0.2);
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
        color: #fff;
        font-weight: 900;
        border: none;
        padding: 6px;
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
    

</style>
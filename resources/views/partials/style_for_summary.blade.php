<style>
    .bg {
        max-width: 1080px;
        overflow: hidden;
        margin: 0 auto;
        box-sizing: border-box;
        padding: 40px;
        font-family: 'Roboto';
    }
    .card {
        box-sizing: border-box;
        position: relative;
        float: left;
        text-align: center;
        width: 100%;
        margin-top: 40px;
        border-radius: 5px;
        padding: 80px 15px 25px 15px;
        border: 1px solid #ccc;
        background-color: #fff;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        overflow: visible;
    }
    .card__success {
        position: absolute;
        top: -50px;
        left: 145px;
        width: 100px;
        height: 100px;
        border-radius: 100%;
        background-color: #60c878;
        border: 5px solid #fff;
    }
    .card__success i {
        color: #fff;
        line-height: 100px;
        font-size: 45px;
    }
    .card__msg {
        text-transform: uppercase;
        color: #55585b;
        font-size: 2.2rem;
        font-weight: 500;
        margin-bottom: 5px;
    }
    .card__submsg {
        color: #959a9e;
        font-size: 16px;
        font-weight: 400;
        margin-top: 0px;
    }
    .card__body {
            background-color: #f8f6f6;
            border-radius: 4px;
            width: 100%;
            margin-top: 30px;
            float: left;
            box-sizing: border-box;
            padding: 16px;
    }
    .card__avatar {
        width: 50px;
        height: 50px;
        border-radius: 100%;
        display: inline-block;
        margin-right: 10px;
        position: relative;
        top: 7px;
    }
    .card__recipient-info {
        display: inline-block;
    }
    .card__recipient {
        color: #232528;
        text-align: left;
        margin-bottom: 5px;
        font-weight: 600;
    }
    .card__email {
        color: #838890;
        text-align: left;
        margin-top: 0px;
    }
    .card__price {
        color: #232528;
        font-size: 30px;
        margin-top: 25px;
        margin-bottom: 30px;
    }
    .card__price span {
        font-size: 60%;
    }
    .card__method {
        color: #d3cece;
        text-transform: uppercase;
        text-align: left;
        font-size: 11px;
        margin-bottom: 5px;
    }
    .card__payment {
        background-color: #fff;
        border-radius: 4px;
        width: 100%;
        height: 100px;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .card__credit-card {
        max-width: 300px;
        display: inline-block;
        margin-right: 15px;
    }
    .card__card-details {
        display: inline-block;
        text-align: left;
    }
        .card__card-type {
        text-transform: uppercase;
        color: #232528;
        font-weight: 600;
        font-size: 12px;
        margin-bottom: 3px;
    }
    .card__card-number {
        color: #838890;
        font-size: 12px;
        margin-top: 0px;
    }
    .card__tags {
        clear: both;
        padding-top: 15px;
    }
    .card__tag {
        text-transform: uppercase;
        background-color: #f8f6f6;
        box-sizing: border-box;
        padding: 3px 5px;
        border-radius: 3px;
        font-size: 10px;
        color: #d3cece;
    }
    @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700");
    
    .btn-splatter {
    color: #ffffff;
    font-family: inherit;
    font-weight: bold;
    background-color: #4487ed;
    width: 12em;
    height: 4em;
    border: 0;
    outline: 0;
    padding: 0;
    margin: 0;
    position: relative;
    border-radius: 0.9em;
    box-shadow: 0 0.6em 0.9em rgba(0, 0, 0, 0.6);
    user-select: none; /* Thanks to @SplittyDev */
    transform: translateY(-0.5em);
    transition:
        background-color 300ms cubic-bezier(0.18, 0.89, 0.32, 1.28),
        box-shadow 300ms cubic-bezier(0.18, 0.89, 0.32, 1.28),
        transform 300ms cubic-bezier(0.18, 0.89, 0.32, 1.28);
    }
    
    .btn-splatter:focus {
    outline: 0;
    }
    
    .btn-splatter:active {
    background-color: #2770df;
    box-shadow: 0 0 0 rgba(0, 0, 0, 0.5);
    transform: translateY(0em) scale(0.9);
    transition:
        background-color 150ms ease-out,
        box-shadow 150ms ease-out,
        transform 150ms ease-out;
    }
    
    .splatter {
    position: absolute;
    top: 0;
    left: 0;
    }
    
    .splatter-round, .splatter-ring, .splatter-star {
    position: absolute;
    }
    
    .splatter-round {
    width: 1em;
    height: 1em;
    background-color: #1da5ff;
    border-radius: 50%;
    }
    
    .splatter-ring {
    width: 0.8em;
    height: 0.8em;
    border: solid 0.35em #0099e6;
    border-radius: 50%;
    }
    
    .splatter-star {
    width: 1.8em;
    height: 1.8em;
    background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="%23006dd0" viewBox="0 0 24 24"%3E%3Cpath%20d%3D%22M12%2C17.27L18.18%2C21L16.54%2C13.97L22%2C9.24L14.81%2C8.62L12%2C2L9.19%2C8.62L2%2C9.24L7.45%2C13.97L5.82%2C21L12%2C17.27Z%22%3E%3C%2Fpath%3E%3C/svg%3E');
    }
</style>
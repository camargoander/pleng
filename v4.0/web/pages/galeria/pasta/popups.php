body {
    background-color: #F4F4F4;
    color: #717f81;
}

main {
    max-width: 1200px;
    text-align: justify;
}

main h1 {
    margin-left: 10%;
}

nav {
    position: fixed;
    height: 100%;
    background-color: #FEF9EF;
    top: 0;
    left: 0;
    color: #00525E;
    padding: 10px;
    display: flex;
    flex-direction: column;
    text-align: -webkit-center;
    box-shadow: 0px 0px 10px 5px rgba(218, 218, 218, 0.65);
    width: 130px;
}


nav .seta {
    text-decoration:none;
    color: #00525E;
    transition: all 0.5s;
}

nav .seta:hover {
    margin-right: 20px;
}

nav h1 {
    transform: rotate(270deg);
    position: relative;
    top: calc(50% - 20px);
}

nav div {
    position: absolute;
    bottom: 50;
    width: 125px;
}

nav div button {
    width: 30px;
    height: 30px;
    border-radius: 8px;
    transition: background-color 0.2s;
    margin-top: 50px;
    font-size: 14px;
    cursor: pointer;
}


nav div .btnEditar {
    background-color: #00A2B8;
    color: #FEF9EF;
    border: 0;
}

nav div .btnEditar:hover {
    background-color: #007D8D;
}

nav div .btnAdicionar {
    background-color: #FEF9EF;
    color: #00A2B8;
    border: 1px solid #00A2B8;
}

nav div .btnAdicionar:hover {
    background-color: #E1E5F2;
}

nav div .btnExcluir {
    background-color: #FEF9EF;
    color: #b80000;
    border: 1px solid #b80000;
}

nav div .btnExcluir:hover {
    background-color: #f2e1e1;
}

.full {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.full .content {
    background-color: rgba(0,0,0,0.75) !important;
    height: 100%;
    width: 100%;
    display: grid;
}

.full .content img {
    left: 50%;
    transform: translate3d(0, 0, 0);
    animation: zoomin 1s ease;
    max-width: 60%;
    max-height: 45%;
    margin: 20px auto;
}

.full .wrapper {
    display: none;
}

.full .content p {
    display: block;
    border-radius: 0;
    padding: 50px 80px;
}

.gallery {
    width: 85%;
    margin-left: 10%;
    display: grid;
    grid-column-gap: 8px;
    grid-row-gap: 8px;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    grid-auto-rows: 8px;
}

.gallery .content {
    position: relative;
}

.gallery img {
    max-width: 100%;
    border-radius: 8px;
    box-shadow: 0 0 16px #333;
    transition: all 1.5s ease;
}

.gallery p {
    position: absolute;
    z-index: 9999;
    bottom: 0;
    padding: 30px 10px 10px 10px;
    background: rgb(2,0,36);
    background: linear-gradient(360deg, 
    rgba(2,0,36,1) 0%, 
    rgba(0,125,141,0.7203256302521008) 84%, 
    rgba(166,233,241,0) 100%);
    margin-bottom: 0;
    border-radius: 8px;
    color: #FEF9EF;
    display: none;
}

.gallery img:hover ~ p {
    display: block;
}

.gallery p:hover {
    display: block;
}

.gallery img:hover {
    box-shadow: 0 0 32px #333;
}

.gallery .gallery-item {
    transition: grid-row-start 300ms linear;
    transition: transform 300ms ease;
    transition: all 0.5s ease;
    cursor: pointer;
}

.gallery .gallery-item:hover {
    transform: scale(1.025);
}

.hidden {
    display: none !important;
}

.wrapper {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
  }
  
.close-button {
    display: block;
    width: 35px;
    height: 35px;
    position: relative;
    overflow: hidden;
}

.close-button > div {
    position: relative;
}

.close-button-block {
    width: 40px;
    height: 20px;
    position: relative;
    overflow: hidden;
}

.close-button-block:before, .close-button-block:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: calc(55% - 4px);
    display: block;
    width: 4px;
    height: 20px;
    transform-origin: bottom center;
    background: white;
    transition: all ease-out 280ms;
}

.close-button-block:last-of-type {
    transform: rotate(180deg);
}

.close-button .in .close-button-block:before {
    transition-delay: 280ms;
    transform: translateX(20px) translateY(-20px) rotate(45deg);
}

.close-button .in .close-button-block:after {
    transition-delay: 280ms;
    transform: translateX(-22px) translateY(-22px) rotate(-45deg);
}

.close-button .out {
    position: absolute;
    top: 0;
    left: 0;
}

.close-button .out .close-button-block:before {
    transform: translateX(-5px) translateY(5px) rotate(45deg);
}

.close-button .out .close-button-block:after {
    transform: translateX(5px) translateY(5px) rotate(-45deg);
}

.close-button:hover .in .close-button-block:before {
    transform: translateX(-5px) translateY(5px) rotate(45deg);
}

.close-button:hover .in .close-button-block:after {
    transform: translateX(5px) translateY(5px) rotate(-45deg);
}

.close-button:hover .out .close-button-block:before {
    transform: translateX(-15px) translateY(15px) rotate(45deg);
}

.close-button:hover .out .close-button-block:after {
    transform: translateX(15px) translateY(15px) rotate(-45deg);
}

@keyframes zoomin {
    0% {
      max-width: 50%;
      filter: blur(4px);
    }
    30% {
      filter: blur(4px);
    }
    100% {
      max-width: 50%;
    }
}

form {
    width: 100%!important;
}

.items {
    width: 100%;
    text-align: left;
    display: flex;
}
  
.item {
    width: 50%;
}
  
.item:first-child {
    margin-right: 5%;
}
  
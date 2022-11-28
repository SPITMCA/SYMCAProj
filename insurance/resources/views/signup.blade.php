<!DOCTYPE html>
<html>
  <!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://unpkg.com/aos@2.3.1/dist/aos.css"
    />
    <link rel="stylesheet" type="text/css" href="/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="/css/Signup.css" />

    <script
      type="text/javascript"
      src="https://unpkg.com/aos@2.3.1/dist/aos.js"
    ></script>
    <script
      type="text/javascript"
      src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"
    ></script>
    <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.3.js"></script>

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

*,
*::before,
*::after {
    box-sizing: border-box;
}

h1, h2, h3, h4, h5, h6, hr, p, figure {
    display: block;
    font-size: 1em;
    font-weight: normal;
    margin: 0;
    border-width: 0;
    opacity: 1;
}

ul, ul {
    display: block;
    margin: 0;
    padding: 0;
}

li {
    display: block;
}

body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen",
    "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue",
    sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

code {
    font-family: source-code-pro, Menlo, Monaco, Consolas, "Courier New",
    monospace;
}

@media (max-width: 99999px) {
    .max\:show {
        display: flex;
        flex-direction: column;
    }

    .xxxl\:show {
        display: none;
    }

    .xxl\:show {
        display: none;
    }

    .xl\:show {
        display: none;
    }

    .lg\:show {
        display: none;
    }

    .md\:show {
        display: none;
    }

    .sm\:show {
        display: none;
    }

    .xs\:show {
        display: none;
    }

    .max\:hide {
        display: none;
    }
}

@media (max-width: 2999px) {
    .xxxl\:show {
        display: flex;
    }

    .xxxl\:hide {
        display: none;
    }
}

@media (max-width: 1919px) {
    .xxl\:show {
        display: flex;
    }

    .xxl\:hide {
        display: none;
    }
}

@media (max-width: 1399px) {
    .xl\:show {
        display: flex;
    }

    .xl\:hide {
        display: none;
    }
}

@media (max-width: 1199px) {
    .lg\:show {
        display: flex;
    }

    .lg\:hide {
        display: none;
    }
}

@media (max-width: 991px) {
    .md\:show {
        display: flex;
    }

    .md\:hide {
        display: none;
    }
}

@media (max-width: 767px) {
    .sm\:show {
        display: flex;
    }

    .sm\:hide {
        display: none;
    }
}

@media (max-width: 575px) {
    .xs\:show {
        display: flex;
    }

    .xs\:hide {
        display: none;
    }
}

.headroom {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 10000;

    will-change: transform;
    transition: transform 200ms linear;
}

.headroom--pinned {
    transform: translateY(0%);
}

.headroom--unpinned {
    transform: translateY(-100%);
}

/* fonts.css */
@import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
@font-face {
  font-family: "FontAwesome";
  font-weight: normal;
  font-style: normal;
  src: url("https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/fonts/fontawesome-webfont.eot?v=4.3.0");
  src: url("https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/fonts/fontawesome-webfont.eot?#iefix&v=4.3.0")
      format("embedded-opentype"),
    url("https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/fonts/fontawesome-webfont.woff2?v=4.3.0")
      format("woff2"),
    url("https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/fonts/fontawesome-webfont.woff?v=4.3.0")
      format("woff"),
    url("https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/fonts/fontawesome-webfont.ttf?v=4.3.0")
      format("truetype"),
    url("https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/fonts/fontawesome-webfont.svg?v=4.3.0#fontawesomeregular")
      format("svg");
}

/* This source code is exported from pxCode, you can get more document from https://www.pxcode.io */
.signup-group {
  display: flex;
  flex-direction: column;
  background-color: white; }

.signup-group.layout {
  position: relative;
  overflow: hidden;
  min-height: 900px;
  flex-shrink: 0; }

.signup-flex {
  display: flex;
  flex-direction: column; }

.signup-flex.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 83.89%;
  margin: 32px auto; }
  @media (max-width: 1399px) {
    .signup-flex.layout {
      width: 87.41%; } }
  @media (max-width: 1199px) {
    .signup-flex.layout {
      width: 90.25%;
      margin: 28px auto; } }
  @media (max-width: 991px) {
    .signup-flex.layout {
      width: 92.51%;
      margin: 24px auto; } }
  @media (max-width: 767px) {
    .signup-flex.layout {
      width: 94.27%;
      margin: 20px auto; } }
  @media (max-width: 575px) {
    .signup-flex.layout {
      width: 95.64%;
      margin: 18px auto; } }
  @media (max-width: 479px) {
    .signup-flex.layout {
      width: 96.7%;
      margin: 16px auto; } }
  @media (max-width: 383px) {
    .signup-flex.layout {
      width: 97.5%;
      margin: 15px auto; } }

.signup-flex1 {
  display: flex; }
  @media (max-width: 575px) {
    .signup-flex1 {
      flex-wrap: wrap;
      row-gap: 16px; } }

.signup-flex1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 25px; }
  @media (max-width: 1199px) {
    .signup-flex1.layout {
      margin: 0px 22px; } }
  @media (max-width: 991px) {
    .signup-flex1.layout {
      margin: 0px 19px; } }
  @media (max-width: 767px) {
    .signup-flex1.layout {
      margin: 0px 16px; } }
  @media (max-width: 575px) {
    .signup-flex1.layout {
      margin: 0px 14px; } }
  @media (max-width: 479px) {
    .signup-flex1.layout {
      margin: 0px 13px; } }
  @media (max-width: 383px) {
    .signup-flex1.layout {
      margin: 0px 12px; } }

.signup-flex1-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 31px; }
  @media (max-width: 575px) {
    .signup-flex1-item {
      flex: 0 0 100%; } }

.signup-group1 {
  display: flex;
  flex-direction: column;
  background: var(--src) center center/contain no-repeat; }

.signup-group1.layout {
  position: relative;
  flex-grow: 1;
  min-height: 23px;
  flex-shrink: 0;
  margin: 19px 0px 4px; }
  @media (max-width: 1199px) {
    .signup-group1.layout {
      margin: 17px 0px 5px; } }
  @media (max-width: 991px) {
    .signup-group1.layout {
      margin: 14px 0px 5px; } }
  @media (max-width: 767px) {
    .signup-group1.layout {
      margin: 12px 0px 5px; } }
  @media (max-width: 575px) {
    .signup-group1.layout {
      margin: 11px 0px 5px; } }
  @media (max-width: 479px) {
    .signup-group1.layout {
      margin: 10px 0px 5px; } }
  @media (max-width: 383px) {
    .signup-group1.layout {
      margin: 9px 0px 5px; } }

.signup-group2 {
  display: flex;
  flex-direction: column; }

.signup-group2.layout {
  position: absolute;
  top: 0px;
  height: 23px;
  width: 31px;
  right: -26px; }

.signup-group3 {
  display: flex;
  flex-direction: column; }

.signup-group3.layout {
  position: absolute;
  top: -14px;
  height: 35px;
  left: -2px;
  width: 19px; }

.signup-img {
  background: var(--src) center center/contain no-repeat; }

.signup-img.layout {
  position: absolute;
  top: -1px;
  height: 35px;
  left: -10px;
  width: 19px; }

.signup-img.layout1 {
  position: relative;
  height: 35px;
  width: 19px;
  min-width: 19px; }

.signup-img.layout2 {
  position: relative;
  height: 23px;
  width: 31px;
  min-width: 31px; }

.signup-flex1-spacer {
  flex: 0 1 26px; }
  @media (max-width: 575px) {
    .signup-flex1-spacer {
      display: none; } }

.signup-flex1-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 575px) {
    .signup-flex1-item1 {
      flex: 0 0 100%; } }

.signup-txt {
  font: 900 30px/1.2 "Bodoni Moda", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px;
  cursor: pointer; }
  @media (max-width: 1199px) {
    .signup-txt {
      font-size: 27px;
      text-align: left; } }
  @media (max-width: 991px) {
    .signup-txt {
      font-size: 24px; } }
  @media (max-width: 767px) {
    .signup-txt {
      font-size: 21px; } }
  @media (max-width: 575px) {
    .signup-txt {
      font-size: 20px; } }
  @media (max-width: 479px) {
    .signup-txt {
      font-size: 18px; } }
  @media (max-width: 383px) {
    .signup-txt {
      font-size: 17px; } }

.signup-txt.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.signup-flex1-spacer1 {
  flex: 0 1 618px; }
  @media (max-width: 575px) {
    .signup-flex1-spacer1 {
      display: none; } }

.signup-flex1-item2 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 575px) {
    .signup-flex1-item2 {
      flex: 0 0 100%; } }

.signup-txt1 {
  font: 700 20px/1.2 "Lato", Helvetica, Arial, serif;
  color: #222222;
  letter-spacing: 0px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }
  @media (max-width: 1199px) {
    .signup-txt1 {
      font-size: 19px;
      text-align: left; } }
  @media (max-width: 991px) {
    .signup-txt1 {
      font-size: 18px; } }
  @media (max-width: 767px) {
    .signup-txt1 {
      font-size: 17px; } }
  @media (max-width: 479px) {
    .signup-txt1 {
      font-size: 16px; } }

.signup-txt1:hover {
  transform: scale(0.9); }

.signup-txt1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 13px 0px 9px; }
  @media (max-width: 1199px) {
    .signup-txt1.layout {
      margin: 11px 0px 8px; } }
  @media (max-width: 991px) {
    .signup-txt1.layout {
      margin: 10px 0px 7px; } }
  @media (max-width: 767px) {
    .signup-txt1.layout {
      margin: 8px 0px 6px; } }
  @media (max-width: 575px) {
    .signup-txt1.layout {
      margin: 7px 0px 5px; } }
  @media (max-width: 383px) {
    .signup-txt1.layout {
      margin: 6px 0px 5px; } }

.signup-flex1-spacer2 {
  flex: 0 1 59px; }
  @media (max-width: 575px) {
    .signup-flex1-spacer2 {
      display: none; } }

.signup-flex1-item3 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 575px) {
    .signup-flex1-item3 {
      flex: 0 0 100%; } }

.signup-txt2 {
  font: 700 20px/1.2 "Lato", Helvetica, Arial, serif;
  color: #222222;
  letter-spacing: 0px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }
  @media (max-width: 1199px) {
    .signup-txt2 {
      font-size: 19px;
      text-align: left; } }
  @media (max-width: 991px) {
    .signup-txt2 {
      font-size: 18px; } }
  @media (max-width: 767px) {
    .signup-txt2 {
      font-size: 17px; } }
  @media (max-width: 479px) {
    .signup-txt2 {
      font-size: 16px; } }

.signup-txt2:hover {
  transform: scale(0.9); }

.signup-txt2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 13px 0px 9px; }
  @media (max-width: 1199px) {
    .signup-txt2.layout {
      margin: 11px 0px 8px; } }
  @media (max-width: 991px) {
    .signup-txt2.layout {
      margin: 10px 0px 7px; } }
  @media (max-width: 767px) {
    .signup-txt2.layout {
      margin: 8px 0px 6px; } }
  @media (max-width: 575px) {
    .signup-txt2.layout {
      margin: 7px 0px 5px; } }
  @media (max-width: 383px) {
    .signup-txt2.layout {
      margin: 6px 0px 5px; } }

.signup-flex1-spacer3 {
  flex: 0 1 59px; }
  @media (max-width: 575px) {
    .signup-flex1-spacer3 {
      display: none; } }

.signup-flex1-item4 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 575px) {
    .signup-flex1-item4 {
      flex: 0 0 100%; } }

.signup-txt3 {
  font: 700 20px/1.2 "Lato", Helvetica, Arial, serif;
  color: #222222;
  letter-spacing: 0px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }
  @media (max-width: 1199px) {
    .signup-txt3 {
      font-size: 19px;
      text-align: left; } }
  @media (max-width: 991px) {
    .signup-txt3 {
      font-size: 18px; } }
  @media (max-width: 767px) {
    .signup-txt3 {
      font-size: 17px; } }
  @media (max-width: 479px) {
    .signup-txt3 {
      font-size: 16px; } }

.signup-txt3:hover {
  transform: scale(0.9); }

.signup-txt3.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 13px 0px 9px; }
  @media (max-width: 1199px) {
    .signup-txt3.layout {
      margin: 11px 0px 8px; } }
  @media (max-width: 991px) {
    .signup-txt3.layout {
      margin: 10px 0px 7px; } }
  @media (max-width: 767px) {
    .signup-txt3.layout {
      margin: 8px 0px 6px; } }
  @media (max-width: 575px) {
    .signup-txt3.layout {
      margin: 7px 0px 5px; } }
  @media (max-width: 383px) {
    .signup-txt3.layout {
      margin: 6px 0px 5px; } }

.signup-flex2 {
  display: flex; }
  @media (max-width: 1199px) {
    .signup-flex2 {
      flex-wrap: wrap;
      row-gap: 16px; } }

.signup-flex2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 95.12%;
  margin: 40px 0% 0px 4.88%; }
  @media (max-width: 1199px) {
    .signup-flex2.layout {
      margin: 35px 0% 0px 4.88%; } }
  @media (max-width: 991px) {
    .signup-flex2.layout {
      margin: 29px 0% 0px 4.88%; } }
  @media (max-width: 767px) {
    .signup-flex2.layout {
      margin: 24px 0% 0px 4.88%; } }
  @media (max-width: 575px) {
    .signup-flex2.layout {
      margin: 21px 0% 0px 4.88%; } }
  @media (max-width: 479px) {
    .signup-flex2.layout {
      margin: 19px 0% 0px 4.88%; } }
  @media (max-width: 383px) {
    .signup-flex2.layout {
      margin: 17px 0% 0px 4.88%; } }

.signup-flex2-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 312px; }
  @media (max-width: 1199px) {
    .signup-flex2-item {
      flex: 0 0 50%; } }

.signup-flex3 {
  display: flex;
  flex-direction: column; }

.signup-flex3.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 176px 0px 148px; }
  @media (max-width: 1199px) {
    .signup-flex3.layout {
      margin: 140px 0px 119px; } }
  @media (max-width: 991px) {
    .signup-flex3.layout {
      margin: 101px 0px 87px; } }
  @media (max-width: 767px) {
    .signup-flex3.layout {
      margin: 68px 0px 60px; } }
  @media (max-width: 575px) {
    .signup-flex3.layout {
      margin: 51px 0px 47px; } }
  @media (max-width: 479px) {
    .signup-flex3.layout {
      margin: 34px 0px; } }
  @media (max-width: 383px) {
    .signup-flex3.layout {
      margin: 23px 0px 24px; } }

@media (max-width: 1199px) {
  .signup-txt4-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 991px) {
  .signup-txt4-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 767px) {
  .signup-txt4-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 575px) {
  .signup-txt4-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 479px) {
  .signup-txt4-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 383px) {
  .signup-txt4-box {
    align-items: flex-start;
    justify-content: flex-start; } }

.signup-txt4-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 35px 0px 0px; }
  @media (max-width: 1199px) {
    .signup-txt4-box.layout {
      margin: 0px 30px 0px 0px; } }
  @media (max-width: 991px) {
    .signup-txt4-box.layout {
      margin: 0px 26px 0px 0px; } }
  @media (max-width: 767px) {
    .signup-txt4-box.layout {
      margin: 0px 21px 0px 0px; } }
  @media (max-width: 575px) {
    .signup-txt4-box.layout {
      margin: 0px 19px 0px 0px; } }
  @media (max-width: 479px) {
    .signup-txt4-box.layout {
      margin: 0px 17px 0px 0px; } }
  @media (max-width: 383px) {
    .signup-txt4-box.layout {
      margin: 0px 16px 0px 0px; } }

.signup-txt4 {
  overflow: visible;
  margin-top: 0px;
  margin-bottom: 0px;
  margin: 0px;
  font: 600 50px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px;
  white-space: pre-wrap; }
  @media (max-width: 1199px) {
    .signup-txt4 {
      font-size: 44px;
      text-align: left; } }
  @media (max-width: 991px) {
    .signup-txt4 {
      font-size: 38px; } }
  @media (max-width: 767px) {
    .signup-txt4 {
      font-size: 33px; } }
  @media (max-width: 575px) {
    .signup-txt4 {
      font-size: 30px; } }
  @media (max-width: 479px) {
    .signup-txt4 {
      font-size: 28px; } }
  @media (max-width: 383px) {
    .signup-txt4 {
      font-size: 26px; } }

.signup-txt5 {
  font: 500 35px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .signup-txt5 {
      font-size: 32px;
      text-align: left; } }
  @media (max-width: 991px) {
    .signup-txt5 {
      font-size: 28px; } }
  @media (max-width: 767px) {
    .signup-txt5 {
      font-size: 25px; } }
  @media (max-width: 575px) {
    .signup-txt5 {
      font-size: 23px; } }
  @media (max-width: 479px) {
    .signup-txt5 {
      font-size: 21px; } }
  @media (max-width: 383px) {
    .signup-txt5 {
      font-size: 20px; } }

.signup-txt5.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 20px 0px 0px; }
  @media (max-width: 1199px) {
    .signup-txt5.layout {
      margin: 18px 0px 0px; } }
  @media (max-width: 991px) {
    .signup-txt5.layout {
      margin: 15px 0px 0px; } }
  @media (max-width: 767px) {
    .signup-txt5.layout {
      margin: 13px 0px 0px; } }
  @media (max-width: 575px) {
    .signup-txt5.layout {
      margin: 11px 0px 0px; } }
  @media (max-width: 479px) {
    .signup-txt5.layout {
      margin: 10px 0px 0px; } }

@media (max-width: 1199px) {
  .signup-txt6-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 991px) {
  .signup-txt6-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 767px) {
  .signup-txt6-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 479px) {
  .signup-txt6-box {
    align-items: flex-start;
    justify-content: flex-start; } }

.signup-txt6-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 64px 4px 0px; }
  @media (max-width: 1199px) {
    .signup-txt6-box.layout {
      margin: 55px 5px 0px; } }
  @media (max-width: 991px) {
    .signup-txt6-box.layout {
      margin: 45px 5px 0px; } }
  @media (max-width: 767px) {
    .signup-txt6-box.layout {
      margin: 37px 5px 0px; } }
  @media (max-width: 575px) {
    .signup-txt6-box.layout {
      margin: 32px 5px 0px; } }
  @media (max-width: 479px) {
    .signup-txt6-box.layout {
      margin: 28px 5px 0px; } }
  @media (max-width: 383px) {
    .signup-txt6-box.layout {
      margin: 25px 5px 0px; } }

.signup-txt6 {
  overflow: visible;
  margin-top: 0px;
  margin-bottom: 0px;
  margin: 0px;
  font: 16px/1.2 "Poppins", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px;
  white-space: pre-wrap; }
  @media (max-width: 1199px) {
    .signup-txt6 {
      font-size: 15px;
      text-align: left; } }
  @media (max-width: 991px) {
    .signup-txt6 {
      font-size: 14px; } }
  @media (max-width: 767px) {
    .signup-txt6 {
      font-size: 13px; } }
  @media (max-width: 479px) {
    .signup-txt6 {
      font-size: 12px; } }

.signup-txt7-box {
  cursor: pointer; }
  @media (max-width: 1199px) {
    .signup-txt7-box {
      align-items: flex-start;
      justify-content: flex-start; } }
  @media (max-width: 991px) {
    .signup-txt7-box {
      align-items: flex-start;
      justify-content: flex-start; } }
  @media (max-width: 767px) {
    .signup-txt7-box {
      align-items: flex-start;
      justify-content: flex-start; } }
  @media (max-width: 479px) {
    .signup-txt7-box {
      align-items: flex-start;
      justify-content: flex-start; } }

.signup-txt7-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 10px 0px 0px 4px; }
  @media (max-width: 1199px) {
    .signup-txt7-box.layout {
      margin: 9px 0px 0px 5px; } }
  @media (max-width: 991px) {
    .signup-txt7-box.layout {
      margin: 7px 0px 0px 5px; } }
  @media (max-width: 767px) {
    .signup-txt7-box.layout {
      margin: 6px 0px 0px 5px; } }
  @media (max-width: 479px) {
    .signup-txt7-box.layout {
      margin: 5px 0px 0px 5px; } }

.signup-txt7 {
  overflow: visible;
  margin-top: 0px;
  margin-bottom: 0px;
  margin: 0px;
  font: 16px/1.2 "Poppins", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px;
  white-space: pre-wrap; }
  @media (max-width: 1199px) {
    .signup-txt7 {
      font-size: 15px;
      text-align: left; } }
  @media (max-width: 991px) {
    .signup-txt7 {
      font-size: 14px; } }
  @media (max-width: 767px) {
    .signup-txt7 {
      font-size: 13px; } }
  @media (max-width: 479px) {
    .signup-txt7 {
      font-size: 12px; } }

.signup-txt7-span0 {
  font: 1em/1.2 "Poppins", Helvetica, Arial, serif;
  color: #000000ff;
  letter-spacing: 0px; }

.signup-txt7-span1 {
  font: 600 1em/1.2 "Poppins", Helvetica, Arial, serif;
  color: #4d47c3ff;
  letter-spacing: 0px; }

.signup-flex3-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 313px; }
  @media (max-width: 1199px) {
    .signup-flex3-item {
      flex: 0 0 50%; } }

.signup-img.layout3 {
  position: relative;
  height: 556px;
  margin: 8px 0px 0px; }
  @media (max-width: 1199px) {
    .signup-img.layout3 {
      margin: 7px 0px 0px; } }
  @media (max-width: 991px) {
    .signup-img.layout3 {
      margin: 6px 0px 0px; } }
  @media (max-width: 767px) {
    .signup-img.layout3 {
      margin: 5px 0px 0px; } }

.signup-flex3-spacer {
  flex: 0 1 127px; }
  @media (max-width: 1199px) {
    .signup-flex3-spacer {
      display: none; } }

.signup-flex3-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 397px; }
  @media (max-width: 1199px) {
    .signup-flex3-item1 {
      flex: 0 0 100%; } }

.signup-flex4 {
  display: flex;
  flex-direction: column; }

.signup-flex4.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 0px 19px; }
  @media (max-width: 1199px) {
    .signup-flex4.layout {
      margin: 0px 0px 17px; } }
  @media (max-width: 991px) {
    .signup-flex4.layout {
      margin: 0px 0px 14px; } }
  @media (max-width: 767px) {
    .signup-flex4.layout {
      margin: 0px 0px 12px; } }
  @media (max-width: 575px) {
    .signup-flex4.layout {
      margin: 0px 0px 11px; } }
  @media (max-width: 479px) {
    .signup-flex4.layout {
      margin: 0px 0px 10px; } }
  @media (max-width: 383px) {
    .signup-flex4.layout {
      margin: 0px 0px 9px; } }

.signup-txt8 {
  font: 500 30px/1.2 "Poppins", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .signup-txt8 {
      font-size: 27px;
      text-align: left; } }
  @media (max-width: 991px) {
    .signup-txt8 {
      font-size: 24px; } }
  @media (max-width: 767px) {
    .signup-txt8 {
      font-size: 21px; } }
  @media (max-width: 575px) {
    .signup-txt8 {
      font-size: 20px; } }
  @media (max-width: 479px) {
    .signup-txt8 {
      font-size: 18px; } }
  @media (max-width: 383px) {
    .signup-txt8 {
      font-size: 17px; } }

.signup-txt8.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 6px; }
  @media (max-width: 1199px) {
    .signup-txt8.layout {
      margin: 0px 5px; } }

.signup-flex5 {
  display: flex; }

.signup-flex5.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 8px 0px 0px 3px; }
  @media (max-width: 1199px) {
    .signup-flex5.layout {
      margin: 7px 0px 0px 5px; } }
  @media (max-width: 991px) {
    .signup-flex5.layout {
      margin: 6px 0px 0px 5px; } }
  @media (max-width: 767px) {
    .signup-flex5.layout {
      margin: 5px 0px 0px 5px; } }

.signup-flex5-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 169px; }

.signup-rect {
  background-color: #f0efff;
  border-radius: 8px 8px 8px 8px;
width:100% ;
border:none;
}

::placeholder { 
  color: grey;
  margin-top: 15px;
  display: inline;
  float: left;
  margin-left: 20px;
  margin-right: 10px;

  font:  "Poppins", Helvetica, Arial, serif;
  
}



.signup-rect.layout {
  position: relative;
  height: 48px; 
}

.signup-flex5-spacer {
  flex: 0 1 4px; }

.signup-flex5-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 221px; }

.signup-flex6 {
  display: flex; }

.signup-flex6.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 13px 0px 0px; }
  @media (max-width: 1199px) {
    .signup-flex6.layout {
      margin: 11px 0px 0px; } }
  @media (max-width: 991px) {
    .signup-flex6.layout {
      margin: 10px 0px 0px; } }
  @media (max-width: 767px) {
    .signup-flex6.layout {
      margin: 8px 0px 0px; } }
  @media (max-width: 575px) {
    .signup-flex6.layout {
      margin: 7px 0px 0px; } }
  @media (max-width: 383px) {
    .signup-flex6.layout {
      margin: 6px 0px 0px; } }

.signup-flex6-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 169px; }

.signup-rect.layout1 {
  position: relative;
  height: 48px;
  margin: 0px 0px 1px; }
  @media (max-width: 1199px) {
    .signup-rect.layout1 {
      margin: 0px 0px 5px; } }

.signup-flex6-spacer {
  flex: 0 1 5px; }

.signup-flex6-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 221px; }

.signup-rect.layout2 {
  position: relative;
  height: 48px;
  margin: 1px 0px 0px; }
  @media (max-width: 1199px) {
    .signup-rect.layout2 {
      margin: 5px 0px 0px; } }

.signup-rect.layout3 {
  position: relative;
  height: 48px;
  margin: 13px 2px 0px 0px; }
  @media (max-width: 1199px) {
    .signup-rect.layout3 {
      margin: 11px 5px 0px 0px; } }
  @media (max-width: 991px) {
    .signup-rect.layout3 {
      margin: 10px 5px 0px 0px; } }
  @media (max-width: 767px) {
    .signup-rect.layout3 {
      margin: 8px 5px 0px 0px; } }
  @media (max-width: 575px) {
    .signup-rect.layout3 {
      margin: 7px 5px 0px 0px; } }
  @media (max-width: 383px) {
    .signup-rect.layout3 {
      margin: 6px 5px 0px 0px; } }

.signup-rect.layout4 {
  position: relative;
  height: 48px;
  margin: 13px 2px 0px 0px; }
  @media (max-width: 1199px) {
    .signup-rect.layout4 {
      margin: 11px 5px 0px 0px; } }
  @media (max-width: 991px) {
    .signup-rect.layout4 {
      margin: 10px 5px 0px 0px; } }
  @media (max-width: 767px) {
    .signup-rect.layout4 {
      margin: 8px 5px 0px 0px; } }
  @media (max-width: 575px) {
    .signup-rect.layout4 {
      margin: 7px 5px 0px 0px; } }
  @media (max-width: 383px) {
    .signup-rect.layout4 {
      margin: 6px 5px 0px 0px; } }

.signup-flex7 {
  display: flex; }

.signup-flex7.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 12px 0px 0px; }
  @media (max-width: 1199px) {
    .signup-flex7.layout {
      margin: 11px 0px 0px; } }
  @media (max-width: 991px) {
    .signup-flex7.layout {
      margin: 9px 0px 0px; } }
  @media (max-width: 767px) {
    .signup-flex7.layout {
      margin: 8px 0px 0px; } }
  @media (max-width: 575px) {
    .signup-flex7.layout {
      margin: 7px 0px 0px; } }
  @media (max-width: 479px) {
    .signup-flex7.layout {
      margin: 6px 0px 0px; } }

.signup-flex7-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 162px; }

.signup-rect.layout5 {
  position: relative;
  height: 48px;
  margin: 1px 0px 0px; }
  @media (max-width: 1199px) {
    .signup-rect.layout5 {
      margin: 5px 0px 0px; } }

.signup-flex7-spacer {
  flex: 0 1 14px; }

.signup-flex7-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 215px; }

.signup-rect.layout6 {
  position: relative;
  height: 48px;
  margin: 0px 0px 1px; }
  @media (max-width: 1199px) {
    .signup-rect.layout6 {
      margin: 0px 0px 5px; } }

.signup-rect.layout7 {
  position: relative;
  height: 48px;
  margin: 13px 2px 0px 0px; }
  @media (max-width: 1199px) {
    .signup-rect.layout7 {
      margin: 11px 5px 0px 0px; } }
  @media (max-width: 991px) {
    .signup-rect.layout7 {
      margin: 10px 5px 0px 0px; } }
  @media (max-width: 767px) {
    .signup-rect.layout7 {
      margin: 8px 5px 0px 0px; } }
  @media (max-width: 575px) {
    .signup-rect.layout7 {
      margin: 7px 5px 0px 0px; } }
  @media (max-width: 383px) {
    .signup-rect.layout7 {
      margin: 6px 5px 0px 0px; } }

.signup-rect.layout8 {
  position: relative;
  height: 48px;
  margin: 19px 2px 0px 0px; }
  @media (max-width: 1199px) {
    .signup-rect.layout8 {
      margin: 17px 5px 0px 0px; } }
  @media (max-width: 991px) {
    .signup-rect.layout8 {
      margin: 14px 5px 0px 0px; } }
  @media (max-width: 767px) {
    .signup-rect.layout8 {
      margin: 12px 5px 0px 0px; } }
  @media (max-width: 575px) {
    .signup-rect.layout8 {
      margin: 11px 5px 0px 0px; } }
  @media (max-width: 479px) {
    .signup-rect.layout8 {
      margin: 10px 5px 0px 0px; } }
  @media (max-width: 383px) {
    .signup-rect.layout8 {
      margin: 9px 5px 0px 0px; } }

.signup-flex7-item2 {
  display: flex;
  flex-direction: column;
  position: relative; }

.signup-cover-block1 {
  display: flex;
  flex-direction: column;
  background-color: #f0efff;
  border-radius: 8px 8px 8px 8px; 
 }
  @media (max-width: 1199px) {
    .signup-txt9 {
      font-size: 15px;
      text-align: right; } }
  @media (max-width: 991px) {
    .signup-txt9 {
      font-size: 14px; } }
  @media (max-width: 767px) {
    .signup-txt9 {
      font-size: 13px; } }
  @media (max-width: 479px) {
    .signup-txt9 {
      font-size: 12px; } }


.signup-cover-block1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 20px 2px 0px 0px;


}
  @media (max-width: 1199px) {
    .signup-cover-block1.layout {
      margin: 18px 5px 0px 0px; } }
  @media (max-width: 991px) {
    .signup-cover-block1.layout {
      margin: 15px 5px 0px 0px; } }
  @media (max-width: 767px) {
    .signup-cover-block1.layout {
      margin: 13px 5px 0px 0px; } }
  @media (max-width: 575px) {
    .signup-cover-block1.layout {
      margin: 11px 5px 0px 0px; } }
  @media (max-width: 479px) {
    .signup-cover-block1.layout {
      margin: 10px 5px 0px 0px; } 
    
    }



.signup-img1 {
  background: var(--src) center center/contain no-repeat;
  width: 100%;
  height: 100%; }

.signup-cover-block {
  display: flex;
  font: 500 16px/1.2 "Poppins", Helvetica, Arial, serif;
  color: white;
  text-align: center;
  letter-spacing: 0px;
  flex-direction: column;
  background-color: #4d47c3;
  border-radius: 9px 9px 9px 9px;
  border:none;
  cursor: pointer;
  padding-top: 20px;
  padding-right: 5px;
  padding-bottom: 40px;
  padding-left: 160px;

  position: relative;
  height:50px;
  width: 390px;
  min-width: 390px;
  margin: 0px 0.17% 0px 67.14%;}

.signup-cover-block.layout {


  
}
  


.signup-txt9 {
  display: flex;
  justify-content: flex-end;
  font: 500 16px/1.2 "Poppins", Helvetica, Arial, serif;
  color: white;
  text-align: right;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .signup-txt9 {
      font-size: 15px;
      text-align: right; } }
  @media (max-width: 991px) {
    .signup-txt9 {
      font-size: 14px; } }
  @media (max-width: 767px) {
    .signup-txt9 {
      font-size: 13px; } }
  @media (max-width: 479px) {
    .signup-txt9 {
      font-size: 12px; } }

.signup-txt9.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 75px;
  min-width: 75px;
  margin: 19px auto 20px; }
  @media (max-width: 1199px) {
    .signup-txt9.layout {
      margin: 17px auto 18px; } }
  @media (max-width: 991px) {
    .signup-txt9.layout {
      margin: 14px auto 15px; } }
  @media (max-width: 767px) {
    .signup-txt9.layout {
      margin: 12px auto 13px; } }
  @media (max-width: 575px) {
    .signup-txt9.layout {
      margin: 11px auto; } }
  @media (max-width: 479px) {
    .signup-txt9.layout {
      margin: 10px auto; } }
  @media (max-width: 383px) {
    .signup-txt9.layout {
      margin: 9px auto 10px; } }

a{
    text-decoration:none;
}

/* coverspin style */
#cover-spin {
    position:fixed;
    width:100%;
    left:0;right:0;top:0;bottom:0;
    background-color: rgba(255,255,255,0.7);
    z-index:9999;
    display:none;
}

@-webkit-keyframes spin {
	from {-webkit-transform:rotate(0deg);}
	to {-webkit-transform:rotate(360deg);}
}

@keyframes spin {
	from {transform:rotate(0deg);}
	to {transform:rotate(360deg);}
}

#cover-spin::after {
    content:'';
    display:block;
    position:absolute;
    left:48%;top:40%;
    width:40px;height:40px;
    border-style:solid;
    border-color:black;
    border-top-color:transparent;
    border-width: 4px;
    border-radius:50%;
    -webkit-animation: spin .8s linear infinite;
    animation: spin .8s linear infinite;
}

    </style>

    

  </head>

  <body style="display: flex; flex-direction: column">
    <div class="signup signup-group layout">
      <div class="signup-flex layout">
        <div class="signup-flex1 layout">
          <div class="signup-flex1-item">
            <div
              style="--src:url(../images/signup/55f24f0aa909f2522fa07fd6ac06720c.png)"
              class="signup-group1 layout"
            >
              <div class="signup-group2 layout">
                <div class="signup-group3 layout">
                  <div
                    style="--src:url(../images/signup/94c45b00bd13155b9a202eb4f1bb4fd0.png)"
                    class="signup-img layout"
                  ></div>
                  <div
                    style="--src:url(../images/signup/3ff342bbf5bea8ba0c64c2cc43218941.png)"
                    class="signup-img layout1"
                  ></div>
                </div>
                <div
                  style="--src:url(../images/signup/4f1ec70c1e2b19301c8b47290e54282b.png)"
                  class="signup-img layout2"
                ></div>
              </div>
            </div>
          </div>
          <div class="signup-flex1-spacer"></div>
          <div class="signup-flex1-item1">
            <div class="signup-txt layout">LifeGood</div>
          </div>
          <div class="signup-flex1-spacer1"></div>
          <div class="signup-flex1-item2">
            <a href="/"><div class="signup-txt1 layout">Home</div></a>
          </div>
          <div class="signup-flex1-spacer2"></div>
          <div class="signup-flex1-item3">
            <div class="signup-txt2 layout">About Us</div>
          </div>
          <div class="signup-flex1-spacer3"></div>
          <div class="signup-flex1-item4">
            <!-- <div class="signup-txt3 layout">Login</div> -->
          </div>
        </div>
        <div class="signup-flex2 layout">
          <div class="signup-flex2-item">
            <div
              class="signup-flex3 layout"
              data-aos="fade-right"
              data-aos-delay="1000"
              data-aos-duration="1000"
            >
              <div class="signup-txt4-box layout">
                <pre class="signup-txt4">Sign Up to </pre>
              </div>
              <div class="signup-txt5 layout">LifeGood</div>
              <div class="signup-txt6-box layout">
                <pre class="signup-txt6">If you already have an account </pre>
              </div>
              <div class="signup-txt7-box layout">
                <pre
                  class="signup-txt7"
                ><a href="/login"><span class="signup-txt7-span1">Login here !</span></a></pre>
              </div>
            </div>
          </div>
          <div class="signup-flex3-item">
            <div
              style="--src:url(../images/signup/405756aeff989e2660dca8b5cff4e9de.png)"
              class="signup-img layout3"
              data-aos="fade-right"
              data-aos-delay="1000"
              data-aos-duration="1000"
            ></div>
          </div>
          <div class="signup-flex3-spacer"></div>
          <div class="signup-flex3-item1">
            <div
              class="signup-flex4 layout"
              data-aos="fade-right"
              data-aos-delay="1000"
              data-aos-duration="1000"
            >
              <div class="signup-txt8 layout">Sign Up</div>

              <!--lay1 start-->
        <form action="{{route('regist')}}" method="post"  id="form_r" enctype="multipart/form-data">
            @csrf
              <div class="signup-flex5 layout">

                  <!--firstname-->
                <div class="signup-flex5-item">
                 <div><input type="text" id="fname" name="fname" class="signup-rect layout" placeholder="firstname"></div>
                </div>

                <div class="signup-flex5-spacer"></div>
                

                <!--middlename-->
                <div class="signup-flex5-item1">
                  <div><input type="text" id="mname" name="mname" class="signup-rect layout" placeholder="middlename"></div>
                </div>
              </div>
              <!--lay1 end-->

              <!--lay2 start-->
              <div class="signup-flex6 layout">
                <div class="signup-flex6-item">
                    <!--lastname-->
                  <div ><input type="text" id="lname" name="lname" class="signup-rect layout1" placeholder="lastname"></div>
                </div>
                <div class="signup-flex6-spacer"></div>
                <div class="signup-flex6-item1">
                    <!--gendr-->
                  <div>
                  <select id="gender" name="gender" class="signup-rect layout2">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>

                </div>
                </div>
              </div>
              
            <!--lay2 end-->

            <!--age-->
              <div><input type="number" id="age"   name="age"  class="signup-rect layout3" placeholder="age"></div>
              <!--email-->
              <div><input type="email" id="email" name="email" class="signup-rect layout4" placeholder="email"></div>

              <!--lay3 start-->
              <div class="signup-flex7 layout">
                <div class="signup-flex7-item">
                    <!--mobileno-->
                  <div><input type="number" id="mbno"  name="mbno" class="signup-rect layout5" placeholder="mobile no"></div>
                </div>
                <div class="signup-flex7-spacer"></div>
                <div class="signup-flex7-item1">
                    <!--city-->
                  <div >
                  <select id="city" name="city" class="signup-rect layout6">
                    <option value="mumbai">Mumbai</option>
                    <option value="pune">Pune</option>
                </select>
                  </div>
                </div>
              </div>
            <!--lay3 end-->

            <!--username-->
              <div ><input type="text" id="uname" name="uname" class="signup-rect layout7" placeholder="username"/></div>
              <!--pass-->
              <div ><input type="password" id="pass" name="pass"  class="signup-rect layout8" placeholder="password"/></div>
              <div class="signup-flex7-item2">
                  <!--confirm pass-->
              <div ><input type="password" id="cnfpass" name="cnfpass" class="signup-rect layout8" placeholder="confirm password"/></div>
              </div>
            </div>
          </div>
        </div>
        <input type="submit"
        
          class="signup-cover-block"
          data-aos="fade-right"
          data-aos-delay="1000"
          data-aos-duration="1000"
        value="Register"
        >
          <!-- <div class="signup-txt9 layout">Register</div> -->

        
    </form>
      </div>
    </div>

    <div id="cover-spin"></div>

    <script type="text/javascript">
      AOS.init();
    </script>

    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
          integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    
<script type="text/javascript" src="js/signup.js"></script>

  </body>
</html>

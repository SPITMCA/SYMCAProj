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
    <link rel="stylesheet" type="text/css" href="/css/Home.css" />

    <script
      type="text/javascript"
      src="https://unpkg.com/aos@2.3.1/dist/aos.js"
    ></script>
    <script
      type="text/javascript"
      src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"
    ></script>
    
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
a:link {
  text-decoration: none;
}


@media (max-width: 99999px) {
    .max\:show {
        display: flex;
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
@import url("https://fonts.googleapis.com/css2?family=Lato&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Bodoni+Moda&display=swap");
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
.home-main {
  display: flex;
  flex-direction: column;
  background-color: white; }

.home-main.layout {
  position: relative;
  overflow: hidden; }

.home-section1__section1 {
  display: flex;
  flex-direction: column; }

.home-section1__section1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.home-section1__flex {
  display: flex;
  flex-direction: column; }

.home-section1__flex.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 35px 0px; }
  @media (max-width: 1199px) {
    .home-section1__flex.layout {
      margin: 30px 0px; } }
  @media (max-width: 991px) {
    .home-section1__flex.layout {
      margin: 26px 0px; } }
  @media (max-width: 767px) {
    .home-section1__flex.layout {
      margin: 21px 0px; } }
  @media (max-width: 575px) {
    .home-section1__flex.layout {
      margin: 19px 0px; } }
  @media (max-width: 479px) {
    .home-section1__flex.layout {
      margin: 17px 0px; } }
  @media (max-width: 383px) {
    .home-section1__flex.layout {
      margin: 16px 0px; } }

.home-section1__flex1 {
  display: flex; }

.home-section1__flex1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 82.5%;
  margin: 25px 6.25% 0px 11.25%; }
  @media (max-width: 1199px) {
    .home-section1__flex1.layout {
      margin: 22px 6.25% 0px 11.25%; } }
  @media (max-width: 991px) {
    .home-section1__flex1.layout {
      margin: 19px 6.25% 0px 11.25%; } }
  @media (max-width: 767px) {
    .home-section1__flex1.layout {
      margin: 16px 6.25% 0px 11.25%; } }
  @media (max-width: 575px) {
    .home-section1__flex1.layout {
      margin: 14px 6.25% 0px 11.25%; } }
  @media (max-width: 479px) {
    .home-section1__flex1.layout {
      margin: 13px 6.25% 0px 11.25%; } }
  @media (max-width: 383px) {
    .home-section1__flex1.layout {
      margin: 12px 6.25% 0px 11.25%; } }

.home-section1__flex1-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 134px; }

.home-section1__group {
  display: flex;
  flex-direction: column; }

.home-section1__group.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.home-section1__txt {
  font: 900 30px/1.2 "Bodoni Moda", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .home-section1__txt {
      font-size: 27px;
      text-align: left; } }
  @media (max-width: 991px) {
    .home-section1__txt {
      font-size: 24px; } }
  @media (max-width: 767px) {
    .home-section1__txt {
      font-size: 21px; } }
  @media (max-width: 575px) {
    .home-section1__txt {
      font-size: 20px; } }
  @media (max-width: 479px) {
    .home-section1__txt {
      font-size: 18px; } }
  @media (max-width: 383px) {
    .home-section1__txt {
      font-size: 17px; } }

.home-section1__txt.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.home-section1__img {
  background: var(--src) center center/contain no-repeat; }

.home-section1__img.layout {
  position: absolute;
  top: 4px;
  height: 35px;
  left: -49px;
  width: 19px; }

.home-section1__img.layout1 {
  position: absolute;
  top: 19px;
  height: 23px;
  left: -63px;
  width: 31px; }

.home-section1__img.layout2 {
  position: absolute;
  top: 5px;
  height: 35px;
  left: -39px;
  width: 19px; }

.home-section1__img.layout3 {
  position: absolute;
  top: 19px;
  height: 23px;
  left: -37px;
  width: 31px; }

.home-section1__flex1-spacer {
  flex: 0 1 616px; }

.home-section1__txt1 {
  font: 700 20px/1.2 "Lato", Helvetica, Arial, serif;
  color: #222222;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .home-section1__txt1 {
      font-size: 19px;
      text-align: left; } }
  @media (max-width: 991px) {
    .home-section1__txt1 {
      font-size: 18px; } }
  @media (max-width: 767px) {
    .home-section1__txt1 {
      font-size: 17px; } }
  @media (max-width: 479px) {
    .home-section1__txt1 {
      font-size: 16px; } }

.home-section1__txt1.layout {
  position: relative;
  flex: 0 0 auto;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 13px 0px 9px; }
  @media (max-width: 1199px) {
    .home-section1__txt1.layout {
      margin: 11px 0px 8px; } }
  @media (max-width: 991px) {
    .home-section1__txt1.layout {
      margin: 10px 0px 7px; } }
  @media (max-width: 767px) {
    .home-section1__txt1.layout {
      margin: 8px 0px 6px; } }
  @media (max-width: 575px) {
    .home-section1__txt1.layout {
      margin: 7px 0px 5px; } }
  @media (max-width: 383px) {
    .home-section1__txt1.layout {
      margin: 6px 0px 5px; } }

.home-section1__flex1-spacer1 {
  flex: 0 1 59px; }

.home-section1__txt2 {
  font: 700 20px/1.2 "Lato", Helvetica, Arial, serif;
  color: #222222;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .home-section1__txt2 {
      font-size: 19px;
      text-align: left; } }
  @media (max-width: 991px) {
    .home-section1__txt2 {
      font-size: 18px; } }
  @media (max-width: 767px) {
    .home-section1__txt2 {
      font-size: 17px; } }
  @media (max-width: 479px) {
    .home-section1__txt2 {
      font-size: 16px; } }

.home-section1__txt2.layout {
  position: relative;
  flex: 0 0 auto;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 13px 0px 9px; }
  @media (max-width: 1199px) {
    .home-section1__txt2.layout {
      margin: 11px 0px 8px; } }
  @media (max-width: 991px) {
    .home-section1__txt2.layout {
      margin: 10px 0px 7px; } }
  @media (max-width: 767px) {
    .home-section1__txt2.layout {
      margin: 8px 0px 6px; } }
  @media (max-width: 575px) {
    .home-section1__txt2.layout {
      margin: 7px 0px 5px; } }
  @media (max-width: 383px) {
    .home-section1__txt2.layout {
      margin: 6px 0px 5px; } }

.home-section1__flex1-spacer2 {
  flex: 0 1 59px; }

.home-section1__txt3 {
  font: 700 20px/1.2 "Lato", Helvetica, Arial, serif;
  color: #222222;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .home-section1__txt3 {
      font-size: 19px;
      text-align: left; } }
  @media (max-width: 991px) {
    .home-section1__txt3 {
      font-size: 18px; } }
  @media (max-width: 767px) {
    .home-section1__txt3 {
      font-size: 17px; } }
  @media (max-width: 479px) {
    .home-section1__txt3 {
      font-size: 16px; } }

.home-section1__txt3.layout {
  position: relative;
  flex: 0 0 auto;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 13px 0px 9px; }
  @media (max-width: 1199px) {
    .home-section1__txt3.layout {
      margin: 11px 0px 8px; } }
  @media (max-width: 991px) {
    .home-section1__txt3.layout {
      margin: 10px 0px 7px; } }
  @media (max-width: 767px) {
    .home-section1__txt3.layout {
      margin: 8px 0px 6px; } }
  @media (max-width: 575px) {
    .home-section1__txt3.layout {
      margin: 7px 0px 5px; } }
  @media (max-width: 383px) {
    .home-section1__txt3.layout {
      margin: 6px 0px 5px; } }

.home-section1__flex2 {
  display: flex; }

.home-section1__flex2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 93.75%;
  margin: 40px 0% 0px 6.25%; }
  @media (max-width: 1199px) {
    .home-section1__flex2.layout {
      margin: 35px 0% 0px 6.25%; } }
  @media (max-width: 991px) {
    .home-section1__flex2.layout {
      margin: 29px 0% 0px 6.25%; } }
  @media (max-width: 767px) {
    .home-section1__flex2.layout {
      margin: 24px 0% 0px 6.25%; } }
  @media (max-width: 575px) {
    .home-section1__flex2.layout {
      margin: 21px 0% 0px 6.25%; } }
  @media (max-width: 479px) {
    .home-section1__flex2.layout {
      margin: 19px 0% 0px 6.25%; } }
  @media (max-width: 383px) {
    .home-section1__flex2.layout {
      margin: 17px 0% 0px 6.25%; } }

.home-section1__flex2-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 516px; }

.home-section1__flex3 {
  display: flex;
  flex-direction: column; }

.home-section1__flex3.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 50px 0px; }
  @media (max-width: 1199px) {
    .home-section1__flex3.layout {
      margin: 43px 0px; } }
  @media (max-width: 991px) {
    .home-section1__flex3.layout {
      margin: 35px 0px; } }
  @media (max-width: 767px) {
    .home-section1__flex3.layout {
      margin: 28px 0px; } }
  @media (max-width: 575px) {
    .home-section1__flex3.layout {
      margin: 24px 0px; } }
  @media (max-width: 479px) {
    .home-section1__flex3.layout {
      margin: 21px 0px; } }
  @media (max-width: 383px) {
    .home-section1__flex3.layout {
      margin: 19px 0px; } }

.home-section1__txt4 {
  font: 800 48px/1.2 "Lato", Helvetica, Arial, serif;
  color: #222222;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .home-section1__txt4 {
      font-size: 43px;
      text-align: left; } }
  @media (max-width: 991px) {
    .home-section1__txt4 {
      font-size: 37px; } }
  @media (max-width: 767px) {
    .home-section1__txt4 {
      font-size: 32px; } }
  @media (max-width: 575px) {
    .home-section1__txt4 {
      font-size: 30px; } }
  @media (max-width: 479px) {
    .home-section1__txt4 {
      font-size: 27px; } }
  @media (max-width: 383px) {
    .home-section1__txt4 {
      font-size: 25px; } }

.home-section1__txt4.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.home-section1__txt5 {
  font: 18px/1.29 "Lato", Helvetica, Arial, serif;
  color: #666666;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .home-section1__txt5 {
      font-size: 17px;
      text-align: left; } }
  @media (max-width: 991px) {
    .home-section1__txt5 {
      font-size: 16px; } }
  @media (max-width: 767px) {
    .home-section1__txt5 {
      font-size: 15px; } }
  @media (max-width: 479px) {
    .home-section1__txt5 {
      font-size: 14px; } }

.home-section1__txt5.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 12px 0px 0px; }
  @media (max-width: 1199px) {
    .home-section1__txt5.layout {
      margin: 11px 0px 0px; } }
  @media (max-width: 991px) {
    .home-section1__txt5.layout {
      margin: 9px 0px 0px; } }
  @media (max-width: 767px) {
    .home-section1__txt5.layout {
      margin: 8px 0px 0px; } }
  @media (max-width: 575px) {
    .home-section1__txt5.layout {
      margin: 7px 0px 0px; } }
  @media (max-width: 479px) {
    .home-section1__txt5.layout {
      margin: 6px 0px 0px; } }

.home-section1__group1 {
  display: flex;
  flex-direction: column;
  background-color: #6432a4;
  border-radius: 4px 4px 4px 4px; }

.home-section1__group1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 30.43%;
  margin: 48px 69.57% 0px 0%; }
  @media (max-width: 1199px) {
    .home-section1__group1.layout {
      margin: 41px 69.57% 0px 0%; } }
  @media (max-width: 991px) {
    .home-section1__group1.layout {
      margin: 33px 69.57% 0px 0%; } }
  @media (max-width: 767px) {
    .home-section1__group1.layout {
      margin: 27px 69.57% 0px 0%; } }
  @media (max-width: 575px) {
    .home-section1__group1.layout {
      margin: 24px 69.57% 0px 0%; } }
  @media (max-width: 479px) {
    .home-section1__group1.layout {
      margin: 20px 69.57% 0px 0%; } }
  @media (max-width: 383px) {
    .home-section1__group1.layout {
      margin: 18px 69.57% 0px 0%; } }

.home-section1__txt6 {
  font: 700 18px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .home-section1__txt6 {
      font-size: 17px;
      text-align: left; } }
  @media (max-width: 991px) {
    .home-section1__txt6 {
      font-size: 16px; } }
  @media (max-width: 767px) {
    .home-section1__txt6 {
      font-size: 15px; } }
  @media (max-width: 479px) {
    .home-section1__txt6 {
      font-size: 14px; } }

.home-section1__txt6.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 14px 31px 14px 32px; }
  @media (max-width: 1199px) {
    .home-section1__txt6.layout {
      margin: 12px 27px 12px 28px; } }
  @media (max-width: 991px) {
    .home-section1__txt6.layout {
      margin: 10px 23px 10px 24px; } }
  @media (max-width: 767px) {
    .home-section1__txt6.layout {
      margin: 9px 19px 9px 20px; } }
  @media (max-width: 575px) {
    .home-section1__txt6.layout {
      margin: 8px 18px; } }
  @media (max-width: 479px) {
    .home-section1__txt6.layout {
      margin: 7px 16px; } }
  @media (max-width: 383px) {
    .home-section1__txt6.layout {
      margin: 7px 15px; } }

.home-section1__flex2-spacer {
  flex: 0 1 3px; }

.home-section1__flex2-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 681px; }

.home-section1__img1 {
  background: var(--src) center center/100% 100% no-repeat; }

.home-section1__img1.layout {
  position: relative;
  height: 430px;
  min-width: 681px;
  max-width: 681px; }

.home-section2__section2 {
  display: flex;
  flex-direction: column; }

.home-section2__section2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.home-section2__flex4 {
  display: flex; }

.home-section2__flex4.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 87.5%;
  margin: 25px auto; }
  @media (max-width: 1199px) {
    .home-section2__flex4.layout {
      width: 90.32%;
      margin: 22px auto; } }
  @media (max-width: 991px) {
    .home-section2__flex4.layout {
      width: 92.56%;
      margin: 19px auto; } }
  @media (max-width: 767px) {
    .home-section2__flex4.layout {
      width: 94.32%;
      margin: 16px auto; } }
  @media (max-width: 575px) {
    .home-section2__flex4.layout {
      width: 95.68%;
      margin: 14px auto; } }
  @media (max-width: 479px) {
    .home-section2__flex4.layout {
      width: 96.72%;
      margin: 13px auto; } }
  @media (max-width: 383px) {
    .home-section2__flex4.layout {
      width: 97.52%;
      margin: 12px auto; } }

.home-section2__flex4-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 320px; }

.home-section2__content-box1 {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 1px 20px 1px rgba(0, 0, 0, 0.2);
  border-radius: 8px 8px 8px 8px; }

.home-section2__content-box1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 78px 0px 41px; }
  @media (max-width: 1199px) {
    .home-section2__content-box1.layout {
      margin: 66px 0px 35px; } }
  @media (max-width: 991px) {
    .home-section2__content-box1.layout {
      margin: 53px 0px 29px; } }
  @media (max-width: 767px) {
    .home-section2__content-box1.layout {
      margin: 42px 0px 24px; } }
  @media (max-width: 575px) {
    .home-section2__content-box1.layout {
      margin: 37px 0px 21px; } }
  @media (max-width: 479px) {
    .home-section2__content-box1.layout {
      margin: 31px 0px 19px; } }
  @media (max-width: 383px) {
    .home-section2__content-box1.layout {
      margin: 28px 0px 17px; } }

.home-section2__img {
  background: var(--src) center center/contain no-repeat; }

.home-section2__img.layout {
  position: relative;
  height: 200px;
  margin: 0px 0px 0px 3px; }
  @media (max-width: 1199px) {
    .home-section2__img.layout {
      margin: 0px 0px 0px 5px; } }

.home-section2__txt {
  font: 700 22px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .home-section2__txt {
      font-size: 21px;
      text-align: left; } }
  @media (max-width: 991px) {
    .home-section2__txt {
      font-size: 19px; } }
  @media (max-width: 767px) {
    .home-section2__txt {
      font-size: 18px; } }
  @media (max-width: 575px) {
    .home-section2__txt {
      font-size: 17px; } }
  @media (max-width: 383px) {
    .home-section2__txt {
      font-size: 16px; } }

.home-section2__txt.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 48.75%;
  margin: 20px auto 0px; }
  @media (max-width: 1199px) {
    .home-section2__txt.layout {
      margin: 18px auto 0px; } }
  @media (max-width: 991px) {
    .home-section2__txt.layout {
      margin: 15px auto 0px; } }
  @media (max-width: 767px) {
    .home-section2__txt.layout {
      margin: 13px auto 0px; } }
  @media (max-width: 575px) {
    .home-section2__txt.layout {
      margin: 11px auto 0px; } }
  @media (max-width: 479px) {
    .home-section2__txt.layout {
      margin: 10px auto 0px; } }

.home-section2__txt1 {
  display: flex;
  justify-content: center;
  font: 16px/1.29 "Roboto", Helvetica, Arial, serif;
  color: #666666;
  text-align: center;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .home-section2__txt1 {
      font-size: 15px;
      text-align: center; } }
  @media (max-width: 991px) {
    .home-section2__txt1 {
      font-size: 14px; } }
  @media (max-width: 767px) {
    .home-section2__txt1 {
      font-size: 13px; } }
  @media (max-width: 479px) {
    .home-section2__txt1 {
      font-size: 12px; } }

.home-section2__txt1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 12px 32px 0px; }
  @media (max-width: 1199px) {
    .home-section2__txt1.layout {
      margin: 11px 28px 0px; } }
  @media (max-width: 991px) {
    .home-section2__txt1.layout {
      margin: 9px 24px 0px; } }
  @media (max-width: 767px) {
    .home-section2__txt1.layout {
      margin: 8px 20px 0px; } }
  @media (max-width: 575px) {
    .home-section2__txt1.layout {
      margin: 7px 18px 0px; } }
  @media (max-width: 479px) {
    .home-section2__txt1.layout {
      margin: 6px 16px 0px; } }
  @media (max-width: 383px) {
    .home-section2__txt1.layout {
      margin: 6px 15px 0px; } }

.home-section2__cover-block {
  display: flex;
  flex-direction: column;
  background-color: #6432a4;
  border-radius: 5px 5px 5px 5px; }

.home-section2__cover-block.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 22px 32px 0px; }
  @media (max-width: 1199px) {
    .home-section2__cover-block.layout {
      margin: 19px 28px 0px; } }
  @media (max-width: 991px) {
    .home-section2__cover-block.layout {
      margin: 16px 24px 0px; } }
  @media (max-width: 767px) {
    .home-section2__cover-block.layout {
      margin: 14px 20px 0px; } }
  @media (max-width: 575px) {
    .home-section2__cover-block.layout {
      margin: 13px 18px 0px; } }
  @media (max-width: 479px) {
    .home-section2__cover-block.layout {
      margin: 11px 16px 0px; } }
  @media (max-width: 383px) {
    .home-section2__cover-block.layout {
      margin: 10px 15px 0px; } }

.home-section2__txt2 {
  display: flex;
  justify-content: flex-end;
  font: 600 16px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  text-align: left;
  letter-spacing: 0.32px; }
  @media (max-width: 1199px) {
    .home-section2__txt2 {
      font-size: 15px;
      text-align: left; } }
  @media (max-width: 991px) {
    .home-section2__txt2 {
      font-size: 14px; } }
  @media (max-width: 767px) {
    .home-section2__txt2 {
      font-size: 13px; } }
  @media (max-width: 479px) {
    .home-section2__txt2 {
      font-size: 12px; } }

.home-section2__txt2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 62.5%;
  margin: 14px auto 15px; }
  @media (max-width: 1199px) {
    .home-section2__txt2.layout {
      margin: 12px auto 13px; } }
  @media (max-width: 991px) {
    .home-section2__txt2.layout {
      margin: 10px auto 11px; } }
  @media (max-width: 767px) {
    .home-section2__txt2.layout {
      margin: 9px auto; } }
  @media (max-width: 575px) {
    .home-section2__txt2.layout {
      margin: 8px auto 9px; } }
  @media (max-width: 479px) {
    .home-section2__txt2.layout {
      margin: 7px auto 8px; } }
  @media (max-width: 383px) {
    .home-section2__txt2.layout {
      margin: 7px auto; } }

.home-section2__txt3 {
  display: flex;
  justify-content: flex-end;
  font: 500 12px/1.2 "Lato", Helvetica, Arial, serif;
  color: #666666;
  text-align: right;
  letter-spacing: 0.24px; }

.home-section2__txt3.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 92px;
  min-width: 92px;
  margin: 12px auto 30px; }
  @media (max-width: 1199px) {
    .home-section2__txt3.layout {
      margin: 11px auto 26px; } }
  @media (max-width: 991px) {
    .home-section2__txt3.layout {
      margin: 9px auto 22px; } }
  @media (max-width: 767px) {
    .home-section2__txt3.layout {
      margin: 8px auto 19px; } }
  @media (max-width: 575px) {
    .home-section2__txt3.layout {
      margin: 7px auto 17px; } }
  @media (max-width: 479px) {
    .home-section2__txt3.layout {
      margin: 6px auto 15px; } }
  @media (max-width: 383px) {
    .home-section2__txt3.layout {
      margin: 6px auto 14px; } }

.home-section2__flex4-spacer {
  flex: 0 1 8px; }

.home-section2__flex4-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 467px; }

.home-section2__flex5 {
  display: flex;
  flex-direction: column; }

.home-section2__flex5.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 0px 41px; }
  @media (max-width: 1199px) {
    .home-section2__flex5.layout {
      margin: 0px 0px 35px; } }
  @media (max-width: 991px) {
    .home-section2__flex5.layout {
      margin: 0px 0px 29px; } }
  @media (max-width: 767px) {
    .home-section2__flex5.layout {
      margin: 0px 0px 24px; } }
  @media (max-width: 575px) {
    .home-section2__flex5.layout {
      margin: 0px 0px 21px; } }
  @media (max-width: 479px) {
    .home-section2__flex5.layout {
      margin: 0px 0px 19px; } }
  @media (max-width: 383px) {
    .home-section2__flex5.layout {
      margin: 0px 0px 17px; } }

.home-section2__txt4 {
  font: 700 32px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .home-section2__txt4 {
      font-size: 29px;
      text-align: left; } }
  @media (max-width: 991px) {
    .home-section2__txt4 {
      font-size: 25px; } }
  @media (max-width: 767px) {
    .home-section2__txt4 {
      font-size: 23px; } }
  @media (max-width: 575px) {
    .home-section2__txt4 {
      font-size: 21px; } }
  @media (max-width: 479px) {
    .home-section2__txt4 {
      font-size: 20px; } }
  @media (max-width: 383px) {
    .home-section2__txt4 {
      font-size: 19px; } }

.home-section2__txt4.layout {
  position:relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.home-section2__content-box1.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 68.52%;
  margin: 40px auto 0px; }
  @media (max-width: 1199px) {
    .home-section2__content-box1.layout1 {
      margin: 35px auto 0px; } }
  @media (max-width: 991px) {
    .home-section2__content-box1.layout1 {
      margin: 29px auto 0px; } }
  @media (max-width: 767px) {
    .home-section2__content-box1.layout1 {
      margin: 24px auto 0px; } }
  @media (max-width: 575px) {
    .home-section2__content-box1.layout1 {
      margin: 21px auto 0px; } }
  @media (max-width: 479px) {
    .home-section2__content-box1.layout1 {
      margin: 19px auto 0px; } }
  @media (max-width: 383px) {
    .home-section2__content-box1.layout1 {
      width: 74.39%;
      margin: 17px auto 0px; } }

.home-section2__txt.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 38.75%;
  margin: 20px auto 0px; }
  @media (max-width: 1199px) {
    .home-section2__txt.layout1 {
      margin: 18px auto 0px; } }
  @media (max-width: 991px) {
    .home-section2__txt.layout1 {
      margin: 15px auto 0px; } }
  @media (max-width: 767px) {
    .home-section2__txt.layout1 {
      margin: 13px auto 0px; } }
  @media (max-width: 575px) {
    .home-section2__txt.layout1 {
      margin: 11px auto 0px; } }
  @media (max-width: 479px) {
    .home-section2__txt.layout1 {
      margin: 10px auto 0px; } }

.home-section2__txt5 {
  display: flex;
  justify-content: center;
  font: 16px/1.29 "Roboto", Helvetica, Arial, serif;
  color: #666666;
  text-align: center;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .home-section2__txt5 {
      font-size: 15px;
      text-align: center; } }
  @media (max-width: 991px) {
    .home-section2__txt5 {
      font-size: 14px; } }
  @media (max-width: 767px) {
    .home-section2__txt5 {
      font-size: 13px; } }
  @media (max-width: 479px) {
    .home-section2__txt5 {
      font-size: 12px; } }

.home-section2__txt5.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 12px 32px 0px; }
  @media (max-width: 1199px) {
    .home-section2__txt5.layout {
      margin: 11px 28px 0px; } }
  @media (max-width: 991px) {
    .home-section2__txt5.layout {
      margin: 9px 24px 0px; } }
  @media (max-width: 767px) {
    .home-section2__txt5.layout {
      margin: 8px 20px 0px; } }
  @media (max-width: 575px) {
    .home-section2__txt5.layout {
      margin: 7px 18px 0px; } }
  @media (max-width: 479px) {
    .home-section2__txt5.layout {
      margin: 6px 16px 0px; } }
  @media (max-width: 383px) {
    .home-section2__txt5.layout {
      margin: 6px 15px 0px; } }

.home-section2__txt6 {
  display: flex;
  justify-content: flex-end;
  font: 600 16px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  text-align: left;
  letter-spacing: 0.32px; }
  @media (max-width: 1199px) {
    .home-section2__txt6 {
      font-size: 15px;
      text-align: left; } }
  @media (max-width: 991px) {
    .home-section2__txt6 {
      font-size: 14px; } }
  @media (max-width: 767px) {
    .home-section2__txt6 {
      font-size: 13px; } }
  @media (max-width: 479px) {
    .home-section2__txt6 {
      font-size: 12px; } }

.home-section2__txt6.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 62.5%;
  margin: 14px auto 15px; }
  @media (max-width: 1199px) {
    .home-section2__txt6.layout {
      margin: 12px auto 13px; } }
  @media (max-width: 991px) {
    .home-section2__txt6.layout {
      margin: 10px auto 11px; } }
  @media (max-width: 767px) {
    .home-section2__txt6.layout {
      margin: 9px auto; } }
  @media (max-width: 575px) {
    .home-section2__txt6.layout {
      margin: 8px auto 9px; } }
  @media (max-width: 479px) {
    .home-section2__txt6.layout {
      margin: 7px auto 8px; } }
  @media (max-width: 383px) {
    .home-section2__txt6.layout {
      margin: 7px auto; } }

.home-section2__txt7 {
  display: flex;
  justify-content: flex-end;
  font: 500 12px/1.2 "Lato", Helvetica, Arial, serif;
  color: #666666;
  text-align: right;
  letter-spacing: 0.24px; }

.home-section2__txt7.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 92px;
  min-width: 92px;
  margin: 12px auto 30px; }
  @media (max-width: 1199px) {
    .home-section2__txt7.layout {
      margin: 11px auto 26px; } }
  @media (max-width: 991px) {
    .home-section2__txt7.layout {
      margin: 9px auto 22px; } }
  @media (max-width: 767px) {
    .home-section2__txt7.layout {
      margin: 8px auto 19px; } }
  @media (max-width: 575px) {
    .home-section2__txt7.layout {
      margin: 7px auto 17px; } }
  @media (max-width: 479px) {
    .home-section2__txt7.layout {
      margin: 6px auto 15px; } }
  @media (max-width: 383px) {
    .home-section2__txt7.layout {
      margin: 6px auto 14px; } }

.home-section2__flex4-spacer1 {
  flex: 0 1 5px; }

.home-section2__content-box {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 1px 20px 1px rgba(0, 0, 0, 0.2);
  border-radius: 8px 8px 8px 8px; }

.home-section2__content-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 78px 0px 41px; }
  @media (max-width: 1199px) {
    .home-section2__content-box.layout {
      margin: 66px 0px 35px; } }
  @media (max-width: 991px) {
    .home-section2__content-box.layout {
      margin: 53px 0px 29px; } }
  @media (max-width: 767px) {
    .home-section2__content-box.layout {
      margin: 42px 0px 24px; } }
  @media (max-width: 575px) {
    .home-section2__content-box.layout {
      margin: 37px 0px 21px; } }
  @media (max-width: 479px) {
    .home-section2__content-box.layout {
      margin: 31px 0px 19px; } }
  @media (max-width: 383px) {
    .home-section2__content-box.layout {
      margin: 28px 0px 17px; } }

.home-section2__img.layout1 {
  position: relative;
  height: 200px;
  width: 69.38%;
  margin: 0px auto; }

.home-section2__txt8 {
  display: flex;
  justify-content: flex-end;
  font: 700 22px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  text-align: left;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .home-section2__txt8 {
      font-size: 21px;
      text-align: left; } }
  @media (max-width: 991px) {
    .home-section2__txt8 {
      font-size: 19px; } }
  @media (max-width: 767px) {
    .home-section2__txt8 {
      font-size: 18px; } }
  @media (max-width: 575px) {
    .home-section2__txt8 {
      font-size: 17px; } }
  @media (max-width: 383px) {
    .home-section2__txt8 {
      font-size: 16px; } }

.home-section2__txt8.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 64.38%;
  margin: 20px auto 0px; }
  @media (max-width: 1199px) {
    .home-section2__txt8.layout {
      margin: 18px auto 0px; } }
  @media (max-width: 991px) {
    .home-section2__txt8.layout {
      margin: 15px auto 0px; } }
  @media (max-width: 767px) {
    .home-section2__txt8.layout {
      margin: 13px auto 0px; } }
  @media (max-width: 575px) {
    .home-section2__txt8.layout {
      margin: 11px auto 0px; } }
  @media (max-width: 479px) {
    .home-section2__txt8.layout {
      margin: 10px auto 0px; } }

.home-section2__txt9 {
  display: flex;
  justify-content: center;
  font: 16px/1.29 "Roboto", Helvetica, Arial, serif;
  color: #666666;
  text-align: center;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .home-section2__txt9 {
      font-size: 15px;
      text-align: center; } }
  @media (max-width: 991px) {
    .home-section2__txt9 {
      font-size: 14px; } }
  @media (max-width: 767px) {
    .home-section2__txt9 {
      font-size: 13px; } }
  @media (max-width: 479px) {
    .home-section2__txt9 {
      font-size: 12px; } }

.home-section2__txt9.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 12px 32px 0px; }
  @media (max-width: 1199px) {
    .home-section2__txt9.layout {
      margin: 11px 28px 0px; } }
  @media (max-width: 991px) {
    .home-section2__txt9.layout {
      margin: 9px 24px 0px; } }
  @media (max-width: 767px) {
    .home-section2__txt9.layout {
      margin: 8px 20px 0px; } }
  @media (max-width: 575px) {
    .home-section2__txt9.layout {
      margin: 7px 18px 0px; } }
  @media (max-width: 479px) {
    .home-section2__txt9.layout {
      margin: 6px 16px 0px; } }
  @media (max-width: 383px) {
    .home-section2__txt9.layout {
      margin: 6px 15px 0px; } }

.home-section2__txt10 {
  display: flex;
  justify-content: flex-end;
  font: 600 16px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  text-align: left;
  letter-spacing: 0.32px; }
  @media (max-width: 1199px) {
    .home-section2__txt10 {
      font-size: 15px;
      text-align: left; } }
  @media (max-width: 991px) {
    .home-section2__txt10 {
      font-size: 14px; } }
  @media (max-width: 767px) {
    .home-section2__txt10 {
      font-size: 13px; } }
  @media (max-width: 479px) {
    .home-section2__txt10 {
      font-size: 12px; } }

.home-section2__txt10.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 62.5%;
  margin: 14px auto 15px; }
  @media (max-width: 1199px) {
    .home-section2__txt10.layout {
      margin: 12px auto 13px; } }
  @media (max-width: 991px) {
    .home-section2__txt10.layout {
      margin: 10px auto 11px; } }
  @media (max-width: 767px) {
    .home-section2__txt10.layout {
      margin: 9px auto; } }
  @media (max-width: 575px) {
    .home-section2__txt10.layout {
      margin: 8px auto 9px; } }
  @media (max-width: 479px) {
    .home-section2__txt10.layout {
      margin: 7px auto 8px; } }
  @media (max-width: 383px) {
    .home-section2__txt10.layout {
      margin: 7px auto; } }

.home-section2__txt11 {
  display: flex;
  justify-content: flex-end;
  font: 500 12px/1.2 "Lato", Helvetica, Arial, serif;
  color: #666666;
  text-align: right;
  letter-spacing: 0.24px; }

.home-section2__txt11.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 92px;
  min-width: 92px;
  margin: 12px auto 30px; }
  @media (max-width: 1199px) {
    .home-section2__txt11.layout {
      margin: 11px auto 26px; } }
  @media (max-width: 991px) {
    .home-section2__txt11.layout {
      margin: 9px auto 22px; } }
  @media (max-width: 767px) {
    .home-section2__txt11.layout {
      margin: 8px auto 19px; } }
  @media (max-width: 575px) {
    .home-section2__txt11.layout {
      margin: 7px auto 17px; } }
  @media (max-width: 479px) {
    .home-section2__txt11.layout {
      margin: 6px auto 15px; } }
  @media (max-width: 383px) {
    .home-section2__txt11.layout {
      margin: 6px auto 14px; } }

.home-section3__section3 {
  display: flex;
  flex-direction: column; }

.home-section3__section3.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 0px 11px; }
  @media (max-width: 1199px) {
    .home-section3__section3.layout {
      margin: 0px 0px 10px; } }
  @media (max-width: 991px) {
    .home-section3__section3.layout {
      margin: 0px 0px 8px; } }
  @media (max-width: 767px) {
    .home-section3__section3.layout {
      margin: 0px 0px 7px; } }
  @media (max-width: 575px) {
    .home-section3__section3.layout {
      margin: 0px 0px 6px; } }
  @media (max-width: 383px) {
    .home-section3__section3.layout {
      margin: 0px 0px 5px; } }

.home-section3__flex6 {
  display: flex;
  flex-direction: column; }

.home-section3__flex6.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 57.34%;
  margin: 54px auto; }
  @media (max-width: 1199px) {
    .home-section3__flex6.layout {
      margin: 46px auto; } }
  @media (max-width: 991px) {
    .home-section3__flex6.layout {
      width: 64.2%;
      margin: 38px auto; } }
  @media (max-width: 767px) {
    .home-section3__flex6.layout {
      width: 70.5%;
      margin: 30px auto; } }
  @media (max-width: 575px) {
    .home-section3__flex6.layout {
      width: 76.12%;
      margin: 27px auto; } }
  @media (max-width: 479px) {
    .home-section3__flex6.layout {
      width: 80.95%;
      margin: 23px auto; } }
  @media (max-width: 383px) {
    .home-section3__flex6.layout {
      width: 85%;
      margin: 20px auto; } }

.home-section3__txt {
  display: flex;
  justify-content: flex-end;
  font: 700 32px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  text-align: right;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .home-section3__txt {
      font-size: 29px;
      text-align: right; } }
  @media (max-width: 991px) {
    .home-section3__txt {
      font-size: 25px; } }
  @media (max-width: 767px) {
    .home-section3__txt {
      font-size: 23px; } }
  @media (max-width: 575px) {
    .home-section3__txt {
      font-size: 21px; } }
  @media (max-width: 479px) {
    .home-section3__txt {
      font-size: 20px; } }
  @media (max-width: 383px) {
    .home-section3__txt {
      font-size: 19px; } }

.home-section3__txt.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 70.3%;
  margin: 0px auto; }
  @media (max-width: 575px) {
    .home-section3__txt.layout {
      width: 75.94%; } }
  @media (max-width: 479px) {
    .home-section3__txt.layout {
      width: 80.79%; } }
  @media (max-width: 383px) {
    .home-section3__txt.layout {
      width: 84.87%; } }

.home-section3__txt1 {
  display: flex;
  justify-content: center;
  font: 16px/1.5 "Lato", Helvetica, Arial, serif;
  color: #565656;
  text-align: center;
  letter-spacing: 0.48px; }
  @media (max-width: 1199px) {
    .home-section3__txt1 {
      font-size: 15px;
      text-align: center; } }
  @media (max-width: 991px) {
    .home-section3__txt1 {
      font-size: 14px; } }
  @media (max-width: 767px) {
    .home-section3__txt1 {
      font-size: 13px; } }
  @media (max-width: 479px) {
    .home-section3__txt1 {
      font-size: 12px; } }

.home-section3__txt1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 24px 0px 283px 14px; }
  @media (max-width: 1199px) {
    .home-section3__txt1.layout {
      margin: 21px 0px 221px 12px; } }
  @media (max-width: 991px) {
    .home-section3__txt1.layout {
      margin: 18px 0px 153px 10px; } }
  @media (max-width: 767px) {
    .home-section3__txt1.layout {
      margin: 15px 0px 95px 9px; } }
  @media (max-width: 575px) {
    .home-section3__txt1.layout {
      margin: 14px 0px 66px 8px; } }
  @media (max-width: 479px) {
    .home-section3__txt1.layout {
      margin: 12px 0px 38px 7px; } }
  @media (max-width: 383px) {
    .home-section3__txt1.layout {
      margin: 11px 0px 18px 7px; } }

    </style>

<script>(function(w, d) { w.CollectId = "628db1eefaa7943a0bbb6bda"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>

  </head>

  <body style="display: flex; flex-direction: column">
    <main class="home home-main layout">
      <!-- ======= section1 ======= --> 
      <section class="home-section1__section1 layout">
        <div class="home-section1__flex layout">
          <div class="home-section1__flex1 layout">
            <div class="home-section1__flex1-item">
              <div class="home-section1__group layout">
                <div class="home-section1__txt layout">Lifegood</div>
                <div
                  style="--src:url(../images/94c45b00bd13155b9a202eb4f1bb4fd0.png)"
                  class="home-section1__img layout"
                ></div>
                <div
                  style="--src:url(../images/55f24f0aa909f2522fa07fd6ac06720c.png)"
                  class="home-section1__img layout1"
                ></div>
                <div
                  style="--src:url(../images/3ff342bbf5bea8ba0c64c2cc43218941.png)"
                  class="home-section1__img layout2"
                ></div>
                <div
                  style="--src:url(../images/4f1ec70c1e2b19301c8b47290e54282b.png)"
                  class="home-section1__img layout3"
                ></div>
              </div>
            </div>
            <div class="home-section1__flex1-spacer"></div>
            <div class="home-section1__txt1 layout">Home</div>
            <div class="home-section1__flex1-spacer1"></div>
            <div class="home-section1__txt2 layout">About Us</div>
            <div class="home-section1__flex1-spacer2"></div>
            <a href="/signup"><div class="home-section1__txt3 layout">Signup</div></a>
          </div>
          <div class="home-section1__flex2 layout">
            <div class="home-section1__flex2-item">
              <div class="home-section1__flex3 layout">
                <div
                  class="home-section1__txt4 layout"
                  data-aos="fade-right"
                  data-aos-duration="1000"
                >
                  Health Insurance for you and your loved ones
                </div>
                <div
                  class="home-section1__txt5 layout"
                  data-aos="fade-right"
                  data-aos-duration="1000"
                >
                  Live your up life! While knowing that your loved ones are
                  protected by us
                </div>
                <div
                  class="home-section1__group1 layout"
                  data-aos="fade-right"
                  data-aos-duration="1000"
                >
                <a href="/insurances_all"><div class="home-section1__txt6 layout">Get Started</div></a>
                </div>
              </div>
            </div>
            <div class="home-section1__flex2-spacer"></div>
            <div class="home-section1__flex2-item1">
              <div
                style="--src:url(../images/6993ccf7cbae42c603839d039142fa8b.png)"
                class="home-section1__img1 layout"
                data-aos="fade-right"
                data-aos-delay="500"
                data-aos-duration="1000"
              ></div>
            </div>
          </div>
        </div>
      </section>
      <comment content="======= End section1 =======" break="true"></comment
      ><!-- ======= section2 ======= --> 
      <section class="home-section2__section2 layout">
        <div class="home-section2__flex4 layout">
          <div class="home-section2__flex4-item">
            <div
              class="home-section2__content-box1 layout"
              data-aos="fade-right"
              data-aos-delay="500"
              data-aos-duration="1000"
            >
              <div
                style="--src:url(../images/05859f7b7abaa63b646010885e0ce182.png)"
                class="home-section2__img layout"
              ></div>
              <div class="home-section2__txt layout">Individual Plans</div>
              <div class="home-section2__txt1 layout">
                covers the hospitilizations costs for the person insured
              </div>
              <div class="home-section2__cover-block layout">
                <div class="home-section2__txt2 layout">CHECK OUR PRICES</div>
              </div>
              <div class="home-section2__txt3 layout">FROM 500/MO</div>
            </div>
          </div>
          <div class="home-section2__flex4-spacer"></div>
          <div class="home-section2__flex4-item1">
            <div class="home-section2__flex5 layout">
              <div
                class="home-section2__txt4 layout"
                data-aos="fade-right"
                data-aos-duration="1000"
              >
                Available Health Insurance.
              </div>
              <div
                class="home-section2__content-box1 layout1"
                data-aos="fade-right"
                data-aos-delay="500"
                data-aos-duration="1000"
              >
                <div
                  style="--src:url(../images/7467fff4697b1f60471e42e3c9857931.png)"
                  class="home-section2__img layout"
                ></div>
                <div class="home-section2__txt layout1">Family Plans</div>
                <div class="home-section2__txt5 layout">
                  A fixed sum assured is provided to any family member who falls
                  ill
                </div>
                <div class="home-section2__cover-block layout">
                  <div class="home-section2__txt6 layout">CHECK OUR PRICES</div>
                </div>
                <div class="home-section2__txt7 layout">FROM 500/MO</div>
              </div>
            </div>
          </div>
          <div class="home-section2__flex4-spacer1"></div>
          <div class="home-section2__flex4-item">
            <div
              class="home-section2__content-box layout"
              data-aos="fade-right"
              data-aos-delay="500"
              data-aos-duration="1000"
            >
              <div
                style="--src:url(../images/84f7b1fe6185b9879be91628693e098d.png)"
                class="home-section2__img layout1"
              ></div>
              <div class="home-section2__txt8 layout">
                Senior Citizens Plans
              </div>
              <div class="home-section2__txt9 layout">
                Special policies to meet the needs of citizens who are above 60
              </div>
              <div class="home-section2__cover-block layout">
                <div class="home-section2__txt10 layout">CHECK OUR PRICES</div>
              </div>
              <div class="home-section2__txt11 layout">FROM 500/MO</div>
            </div>
          </div>
        </div>
      </section>
      <comment content="======= End section2 =======" break="true"></comment
      ><!-- ======= section3 ======= --> 
      <section class="home-section3__section3 layout">
        <div
          class="home-section3__flex6 layout"
          data-aos="fade-up"
          data-aos-duration="1000"
        >
          <div class="home-section3__txt layout">
            What are health insurance plans?
          </div>
          <div class="home-section3__txt1 layout">
            Lörem ipsum kvasiren raliga bengar. Trev emstat val. Dedibelt prer
            lun då filotes. Antiv remir. Kvasirinat epik fade. Edödaledes miv.
            Lörem ipsum kvasiren raliga bengar. Trev emstat val. Dedibelt prer
            lun då filotes. Antiv remir. Kvasirinat epik fade. Edödaledes miv.
            Lörem ipsum kvasiren raliga bengar. Trev emstat val. Dedibelt prer
            lun då filotes. Antiv remir. Kvasirinat epik fade. Edödaledes miv.
            Lörem ipsum kvasiren raliga bengar.
          </div>
        </div>
      </section>
      <!-- ======= End section3 ======= --> 

    </main>
    <script type="text/javascript">
      AOS.init();
    </script>
  </body>
</html>

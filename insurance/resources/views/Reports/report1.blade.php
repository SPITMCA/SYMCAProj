<!DOCTYPE html>
<html>
  <!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link
      rel="stylesheet"
      type="text/css"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="/css/Hospital_main.css" />

    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.5.js"></script>

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
@import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Manrope:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
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


.hospital-main-main {
  display: flex;
  flex-direction: column;
  background-color: white; }

.hospital-main-main.layout {
  position: relative;
  overflow: hidden; }

.hospital-main-section1__section1 {
  display: flex;
  flex-direction: column; }

.hospital-main-section1__section1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.hospital-main-section1__flex {
  display: flex;
  flex-direction: column; }

.hospital-main-section1__flex.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 90.78%;
  margin: 0px auto; }
  @media (max-width: 1399px) {
    .hospital-main-section1__flex.layout {
      width: 92.92%; } }
  @media (max-width: 1199px) {
    .hospital-main-section1__flex.layout {
      width: 94.59%; } }
  @media (max-width: 991px) {
    .hospital-main-section1__flex.layout {
      width: 95.89%; } }
  @media (max-width: 767px) {
    .hospital-main-section1__flex.layout {
      width: 96.89%; } }
  @media (max-width: 575px) {
    .hospital-main-section1__flex.layout {
      width: 97.65%; } }
  @media (max-width: 479px) {
    .hospital-main-section1__flex.layout {
      width: 98.22%; } }
  @media (max-width: 383px) {
    .hospital-main-section1__flex.layout {
      width: 98.66%; } }

.hospital-main-section1__flex1 {
  display: flex; }
  @media (max-width: 575px) {
    .hospital-main-section1__flex1 {
      flex-wrap: wrap;
      row-gap: 16px; } }

.hospital-main-section1__flex1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 94.41%;
  margin: 58px 1.38% 0px 4.22%; }
  @media (max-width: 1199px) {
    .hospital-main-section1__flex1.layout {
      margin: 50px 1.38% 0px 4.22%; } }
  @media (max-width: 991px) {
    .hospital-main-section1__flex1.layout {
      margin: 41px 1.38% 0px 4.22%; } }
  @media (max-width: 767px) {
    .hospital-main-section1__flex1.layout {
      margin: 33px 1.38% 0px 4.22%; } }
  @media (max-width: 575px) {
    .hospital-main-section1__flex1.layout {
      margin: 29px 1.38% 0px 4.22%; } }
  @media (max-width: 479px) {
    .hospital-main-section1__flex1.layout {
      margin: 25px 1.38% 0px 4.22%; } }
  @media (max-width: 383px) {
    .hospital-main-section1__flex1.layout {
      margin: 22px 1.38% 0px 4.22%; } }

.hospital-main-section1__flex1-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 19px; }
  @media (max-width: 575px) {
    .hospital-main-section1__flex1-item {
      flex: 0 0 100%; } }

.hospital-main-section1__group {
  display: flex;
  flex-direction: column; }

.hospital-main-section1__group.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 0px 6px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__group.layout {
      margin: 0px 0px 5px; } }

.hospital-main-section1__image10 {
  background: var(--src) center center/contain no-repeat; }

.hospital-main-section1__image10.layout {
  position: absolute;
  top: 0px;
  height: 33px;
  left: -10px;
  width: 19px; }

.hospital-main-section1__image10.layout1 {
  position: relative;
  height: 33px;
  width: 19px;
  min-width: 19px; }

.hospital-main-section1__image11 {
  background: var(--src) center center/contain no-repeat; }

.hospital-main-section1__image11.layout {
  position: absolute;
  top: 14px;
  height: 20px;
  left: -25px;
  width: 31px; }

.hospital-main-section1__image12 {
  background: var(--src) center center/contain no-repeat; }

.hospital-main-section1__image12.layout {
  position: absolute;
  top: 14px;
  height: 20px;
  width: 32px;
  right: -15px; }

.hospital-main-section1__flex1-spacer {
  flex: 0 1 17px; }
  @media (max-width: 575px) {
    .hospital-main-section1__flex1-spacer {
      display: none; } }

.hospital-main-section1__flex1-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 575px) {
    .hospital-main-section1__flex1-item1 {
      flex: 0 0 100%; } }

.hospital-main-section1__big-title1 {
  font: 900 30px/1.2 "Bodoni Moda", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__big-title1 {
      font-size: 27px;
      text-align: left; } }
  @media (max-width: 991px) {
    .hospital-main-section1__big-title1 {
      font-size: 24px; } }
  @media (max-width: 767px) {
    .hospital-main-section1__big-title1 {
      font-size: 21px; } }
  @media (max-width: 575px) {
    .hospital-main-section1__big-title1 {
      font-size: 20px; } }
  @media (max-width: 479px) {
    .hospital-main-section1__big-title1 {
      font-size: 18px; } }
  @media (max-width: 383px) {
    .hospital-main-section1__big-title1 {
      font-size: 17px; } }

.hospital-main-section1__big-title1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 2px 0px 1px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__big-title1.layout {
      margin: 5px 0px; } }

.hospital-main-section1__flex1-spacer1 {
  flex: 0 1 559px; }
  @media (max-width: 575px) {
    .hospital-main-section1__flex1-spacer1 {
      display: none; } }

.hospital-main-section1__flex1-item2 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 575px) {
    .hospital-main-section1__flex1-item2 {
      flex: 0 0 100%; } }

.hospital-main-section1__subtitle2 {
  font: 700 20px/1.2 "Lato", Helvetica, Arial, serif;
  color: #222222;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__subtitle2 {
      font-size: 19px;
      text-align: left; } }
  @media (max-width: 991px) {
    .hospital-main-section1__subtitle2 {
      font-size: 18px; } }
  @media (max-width: 767px) {
    .hospital-main-section1__subtitle2 {
      font-size: 17px; } }
  @media (max-width: 479px) {
    .hospital-main-section1__subtitle2 {
      font-size: 16px; } }

.hospital-main-section1__subtitle2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 15px 0px 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__subtitle2.layout {
      margin: 13px 0px 0px; } }
  @media (max-width: 991px) {
    .hospital-main-section1__subtitle2.layout {
      margin: 11px 0px 0px; } }
  @media (max-width: 767px) {
    .hospital-main-section1__subtitle2.layout {
      margin: 9px 0px 0px; } }
  @media (max-width: 479px) {
    .hospital-main-section1__subtitle2.layout {
      margin: 8px 0px 0px; } }
  @media (max-width: 383px) {
    .hospital-main-section1__subtitle2.layout {
      margin: 7px 0px 0px; } }

.hospital-main-section1__flex1-spacer2 {
  flex: 0 1 54px; }
  @media (max-width: 575px) {
    .hospital-main-section1__flex1-spacer2 {
      display: none; } }

.hospital-main-section1__flex1-item3 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 575px) {
    .hospital-main-section1__flex1-item3 {
      flex: 0 0 100%; } }

.hospital-main-section1__flex1-spacer3 {
  flex: 0 1 54px; }
  @media (max-width: 575px) {
    .hospital-main-section1__flex1-spacer3 {
      display: none; } }

.hospital-main-section1__flex1-item4 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 575px) {
    .hospital-main-section1__flex1-item4 {
      flex: 0 0 100%; } }

.hospital-main-section1__flex2 {
  display: flex; }
  @media (max-width: 1199px) {
    .hospital-main-section1__flex2 {
      flex-wrap: wrap;
      row-gap: 16px; } }

.hospital-main-section1__flex2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 40px 0px 0px 21px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__flex2.layout {
      margin: 35px 0px 0px 18px; } }
  @media (max-width: 991px) {
    .hospital-main-section1__flex2.layout {
      margin: 29px 0px 0px 16px; } }
  @media (max-width: 767px) {
    .hospital-main-section1__flex2.layout {
      margin: 24px 0px 0px 13px; } }
  @media (max-width: 575px) {
    .hospital-main-section1__flex2.layout {
      margin: 21px 0px 0px 12px; } }
  @media (max-width: 479px) {
    .hospital-main-section1__flex2.layout {
      margin: 19px 0px 0px 11px; } }
  @media (max-width: 383px) {
    .hospital-main-section1__flex2.layout {
      margin: 17px 0px 0px 10px; } }

.hospital-main-section1__flex2-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 516px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__flex2-item {
      flex: 0 0 100%; } }

.hospital-main-section1__flex3 {
  display: flex;
  flex-direction: column; }

.hospital-main-section1__flex3.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 59px 0px 37px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__flex3.layout {
      margin: 50px 0px 32px; } }
  @media (max-width: 991px) {
    .hospital-main-section1__flex3.layout {
      margin: 41px 0px 27px; } }
  @media (max-width: 767px) {
    .hospital-main-section1__flex3.layout {
      margin: 33px 0px 22px; } }
  @media (max-width: 575px) {
    .hospital-main-section1__flex3.layout {
      margin: 29px 0px 20px; } }
  @media (max-width: 479px) {
    .hospital-main-section1__flex3.layout {
      margin: 26px 0px 18px; } }
  @media (max-width: 383px) {
    .hospital-main-section1__flex3.layout {
      margin: 23px 0px 16px; } }

.hospital-main-section1__hero-title {
  font: 800 48px/1.2 "Lato", Helvetica, Arial, serif;
  color: #222222;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__hero-title {
      font-size: 43px;
      text-align: left; } }
  @media (max-width: 991px) {
    .hospital-main-section1__hero-title {
      font-size: 37px; } }
  @media (max-width: 767px) {
    .hospital-main-section1__hero-title {
      font-size: 32px; } }
  @media (max-width: 575px) {
    .hospital-main-section1__hero-title {
      font-size: 30px; } }
  @media (max-width: 479px) {
    .hospital-main-section1__hero-title {
      font-size: 27px; } }
  @media (max-width: 383px) {
    .hospital-main-section1__hero-title {
      font-size: 25px; } }

.hospital-main-section1__hero-title.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.hospital-main-section1__highlights {
  font: 18px/1.29 "Lato", Helvetica, Arial, serif;
  color: #666666;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__highlights {
      font-size: 17px;
      text-align: left; } }
  @media (max-width: 991px) {
    .hospital-main-section1__highlights {
      font-size: 16px; } }
  @media (max-width: 767px) {
    .hospital-main-section1__highlights {
      font-size: 15px; } }
  @media (max-width: 479px) {
    .hospital-main-section1__highlights {
      font-size: 14px; } }

.hospital-main-section1__highlights.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 20px 3px 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__highlights.layout {
      margin: 18px 5px 0px; } }
  @media (max-width: 991px) {
    .hospital-main-section1__highlights.layout {
      margin: 15px 5px 0px; } }
  @media (max-width: 767px) {
    .hospital-main-section1__highlights.layout {
      margin: 13px 5px 0px; } }
  @media (max-width: 575px) {
    .hospital-main-section1__highlights.layout {
      margin: 11px 5px 0px; } }
  @media (max-width: 479px) {
    .hospital-main-section1__highlights.layout {
      margin: 10px 5px 0px; } }

.hospital-main-section1__block1 {
  display: flex;
  flex-direction: column;
  background-color: #6432a4;
  border-radius: 9px 9px 9px 9px; }

.hospital-main-section1__block1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 30.43%;
  margin: 26px 68.41% 0px 1.16%; }
  @media (max-width: 1199px) {
    .hospital-main-section1__block1.layout {
      margin: 23px 68.41% 0px 1.16%; } }
  @media (max-width: 991px) {
    .hospital-main-section1__block1.layout {
      margin: 19px 68.41% 0px 1.16%; } }
  @media (max-width: 767px) {
    .hospital-main-section1__block1.layout {
      margin: 16px 68.41% 0px 1.16%; } }
  @media (max-width: 575px) {
    .hospital-main-section1__block1.layout {
      margin: 15px 68.41% 0px 1.16%; } }
  @media (max-width: 479px) {
    .hospital-main-section1__block1.layout {
      margin: 13px 68.41% 0px 1.16%; } }
  @media (max-width: 383px) {
    .hospital-main-section1__block1.layout {
      margin: 12px 68.41% 0px 1.16%; } }

.hospital-main-section1__highlights1 {
  font: 700 18px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__highlights1 {
      font-size: 17px;
      text-align: left; } }
  @media (max-width: 991px) {
    .hospital-main-section1__highlights1 {
      font-size: 16px; } }
  @media (max-width: 767px) {
    .hospital-main-section1__highlights1 {
      font-size: 15px; } }
  @media (max-width: 479px) {
    .hospital-main-section1__highlights1 {
      font-size: 14px; } }

.hospital-main-section1__highlights1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 14px 34px 14px 32px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__highlights1.layout {
      margin: 12px 30px 12px 28px; } }
  @media (max-width: 991px) {
    .hospital-main-section1__highlights1.layout {
      margin: 10px 25px 10px 24px; } }
  @media (max-width: 767px) {
    .hospital-main-section1__highlights1.layout {
      margin: 9px 21px 9px 20px; } }
  @media (max-width: 575px) {
    .hospital-main-section1__highlights1.layout {
      margin: 8px 19px 8px 18px; } }
  @media (max-width: 479px) {
    .hospital-main-section1__highlights1.layout {
      margin: 7px 17px 7px 16px; } }
  @media (max-width: 383px) {
    .hospital-main-section1__highlights1.layout {
      margin: 7px 15px; } }

.hospital-main-section1__flex2-spacer {
  flex: 0 1 42px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__flex2-spacer {
      display: none; } }

.hospital-main-section1__flex2-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 583px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__flex2-item1 {
      flex: 0 0 100%; } }

.hospital-main-section1__image4 {
  background: var(--src) center center/contain no-repeat;
  filter: drop-shadow(0px 2px 16px rgba(88, 126, 236, 0)); }

.hospital-main-section1__image4.layout {
  position: relative;
  height: 389px; }

.hospital-main-section1__flex4 {
  display: flex; }
  @media (max-width: 1199px) {
    .hospital-main-section1__flex4 {
      flex-wrap: wrap;
      row-gap: 16px; } }

.hospital-main-section1__flex4.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 62.31%;
  margin: 77px auto 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__flex4.layout {
      margin: 65px auto 0px; } }
  @media (max-width: 991px) {
    .hospital-main-section1__flex4.layout {
      margin: 53px auto 0px; } }
  @media (max-width: 767px) {
    .hospital-main-section1__flex4.layout {
      width: 68.78%;
      margin: 42px auto 0px; } }
  @media (max-width: 575px) {
    .hospital-main-section1__flex4.layout {
      width: 74.61%;
      margin: 37px auto 0px; } }
  @media (max-width: 479px) {
    .hospital-main-section1__flex4.layout {
      width: 79.67%;
      margin: 31px auto 0px; } }
  @media (max-width: 383px) {
    .hospital-main-section1__flex4.layout {
      width: 83.93%;
      margin: 28px auto 0px; } }

.hospital-main-section1__flex4-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 149px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__flex4-item {
      flex: 0 0 calc(25% - 4px); } }
  @media (max-width: 991px) {
    .hospital-main-section1__flex4-item {
      flex: 0 0 33.33333333333333%; } }

.hospital-main-section1__image5 {
  background: var(--src) center center/contain no-repeat; }

.hospital-main-section1__image5.layout {
  position: relative;
  height: 63px;
  margin: 20px 0px 26px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__image5.layout {
      margin: 18px 0px 23px; } }
  @media (max-width: 991px) {
    .hospital-main-section1__image5.layout {
      margin: 15px 0px 19px; } }
  @media (max-width: 767px) {
    .hospital-main-section1__image5.layout {
      margin: 13px 0px 16px; } }
  @media (max-width: 575px) {
    .hospital-main-section1__image5.layout {
      margin: 11px 0px 15px; } }
  @media (max-width: 479px) {
    .hospital-main-section1__image5.layout {
      margin: 10px 0px 13px; } }
  @media (max-width: 383px) {
    .hospital-main-section1__image5.layout {
      margin: 10px 0px 12px; } }

.hospital-main-section1__flex4-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 137px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__flex4-item1 {
      flex: 0 0 calc(25% - 4px); } }
  @media (max-width: 991px) {
    .hospital-main-section1__flex4-item1 {
      flex: 0 0 33.33333333333333%; } }

.hospital-main-section1__image6 {
  background: var(--src) center center/contain no-repeat; }

.hospital-main-section1__image6.layout {
  position: relative;
  height: 54px;
  margin: 26px 0px 29px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__image6.layout {
      margin: 23px 0px 25px; } }
  @media (max-width: 991px) {
    .hospital-main-section1__image6.layout {
      margin: 19px 0px 22px; } }
  @media (max-width: 767px) {
    .hospital-main-section1__image6.layout {
      margin: 16px 0px 18px; } }
  @media (max-width: 575px) {
    .hospital-main-section1__image6.layout {
      margin: 15px 0px 17px; } }
  @media (max-width: 479px) {
    .hospital-main-section1__image6.layout {
      margin: 13px 0px 15px; } }
  @media (max-width: 383px) {
    .hospital-main-section1__image6.layout {
      margin: 12px 0px 14px; } }

.hospital-main-section1__flex4-item2 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 216px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__flex4-item2 {
      flex: 0 0 calc(25% - 4px); } }
  @media (max-width: 991px) {
    .hospital-main-section1__flex4-item2 {
      flex: 0 0 33.33333333333333%; } }

.hospital-main-section1__group.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 20px 0px 22px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__group.layout1 {
      margin: 18px 0px 19px; } }
  @media (max-width: 991px) {
    .hospital-main-section1__group.layout1 {
      margin: 15px 0px 16px; } }
  @media (max-width: 767px) {
    .hospital-main-section1__group.layout1 {
      margin: 13px 0px 14px; } }
  @media (max-width: 575px) {
    .hospital-main-section1__group.layout1 {
      margin: 11px 0px 13px; } }
  @media (max-width: 479px) {
    .hospital-main-section1__group.layout1 {
      margin: 10px 0px 11px; } }
  @media (max-width: 383px) {
    .hospital-main-section1__group.layout1 {
      margin: 10px 0px; } }

.hospital-main-section1__text-body {
  display: flex;
  justify-content: center;
  font: 700 14.52875px/1.2 "Manrope", Helvetica, Arial, serif;
  color: black;
  text-align: center;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__text-body {
      font-size: 14px;
      text-align: center; } }
  @media (max-width: 991px) {
    .hospital-main-section1__text-body {
      font-size: 13px; } }
  @media (max-width: 575px) {
    .hospital-main-section1__text-body {
      font-size: 12px; } }

.hospital-main-section1__text-body.layout {
  position: absolute;
  top: -33px;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  left: -99.5px;
  width: 354px; }

.hospital-main-section1__image7 {
  background: var(--src) center center/contain no-repeat; }

.hospital-main-section1__image7.layout {
  position: relative;
  height: 67px; }

.hospital-main-section1__flex4-spacer {
  flex: 0 1 7px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__flex4-spacer {
      flex: 0 0 16px; } }
  @media (max-width: 991px) {
    .hospital-main-section1__flex4-spacer {
      display: none; } }

.hospital-main-section1__flex4-item3 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 200px; }
  @media (max-width: 1199px) {
    .hospital-main-section1__flex4-item3 {
      flex: 0 0 calc(25% - 4px); } }
  @media (max-width: 991px) {
    .hospital-main-section1__flex4-item3 {
      flex: 0 0 100%; } }

.hospital-main-section1__image8 {
  background: var(--src) center center/contain no-repeat; }

.hospital-main-section1__image8.layout {
  position: relative;
  height: 109px; }

.hospital-main-section2__section2 {
  display: flex;
  flex-direction: column; }

.hospital-main-section2__section2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.hospital-main-section2__flex5 {
  display: flex; }
  @media (max-width: 991px) {
    .hospital-main-section2__flex5 {
      flex-wrap: wrap;
      row-gap: 16px; } }

.hospital-main-section2__flex5.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 87.5%;
  margin: 24px auto; }
  @media (max-width: 1199px) {
    .hospital-main-section2__flex5.layout {
      width: 90.32%;
      margin: 21px auto; } }
  @media (max-width: 991px) {
    .hospital-main-section2__flex5.layout {
      width: 92.56%;
      margin: 18px auto; } }
  @media (max-width: 767px) {
    .hospital-main-section2__flex5.layout {
      width: 94.32%;
      margin: 15px auto; } }
  @media (max-width: 575px) {
    .hospital-main-section2__flex5.layout {
      width: 95.68%;
      margin: 14px auto; } }
  @media (max-width: 479px) {
    .hospital-main-section2__flex5.layout {
      width: 96.72%;
      margin: 12px auto; } }
  @media (max-width: 383px) {
    .hospital-main-section2__flex5.layout {
      width: 97.52%;
      margin: 11px auto; } }

.hospital-main-section2__flex5-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 323px; }
  @media (max-width: 991px) {
    .hospital-main-section2__flex5-item {
      flex: 0 0 100%; } }

.hospital-main-section2__content-box2 {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 1px 20px 1px rgba(0, 0, 0, 0.2);
  border-radius: 8px 8px 8px 8px; }

.hospital-main-section2__content-box2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 102px 0px 11px 3px; }
  @media (max-width: 1199px) {
    .hospital-main-section2__content-box2.layout {
      margin: 84px 0px 10px 5px; } }
  @media (max-width: 991px) {
    .hospital-main-section2__content-box2.layout {
      margin: 65px 5px 8px; } }
  @media (max-width: 767px) {
    .hospital-main-section2__content-box2.layout {
      margin: 49px 5px 7px; } }
  @media (max-width: 575px) {
    .hospital-main-section2__content-box2.layout {
      margin: 40px 5px 6px; } }
  @media (max-width: 479px) {
    .hospital-main-section2__content-box2.layout {
      margin: 32px 5px 6px; } }
  @media (max-width: 383px) {
    .hospital-main-section2__content-box2.layout {
      margin: 27px 5px 5px; } }

.hospital-main-section2__block2 {
  display: flex;
  flex-direction: column; }

.hospital-main-section2__block2.layout {
  position: relative;
  overflow: hidden;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 41.25%;
  margin: 44px 27.5% 0px 31.25%; }
  @media (max-width: 1199px) {
    .hospital-main-section2__block2.layout {
      margin: 38px 27.5% 0px 31.25%; } }
  @media (max-width: 991px) {
    .hospital-main-section2__block2.layout {
      margin: 31px 27.5% 0px 31.25%; } }
  @media (max-width: 767px) {
    .hospital-main-section2__block2.layout {
      margin: 25px 27.5% 0px 31.25%; } }
  @media (max-width: 575px) {
    .hospital-main-section2__block2.layout {
      margin: 22px 27.5% 0px 31.25%; } }
  @media (max-width: 479px) {
    .hospital-main-section2__block2.layout {
      margin: 20px 27.5% 0px 31.25%; } }
  @media (max-width: 383px) {
    .hospital-main-section2__block2.layout {
      margin: 18px 27.5% 0px 31.25%; } }

.hospital-main-section2__group {
  display: flex;
  flex-direction: column; }

.hospital-main-section2__group.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 6.06%;
  margin: 94px 22.73% 29px 71.21%; }
  @media (max-width: 1199px) {
    .hospital-main-section2__group.layout {
      margin: 78px 22.73% 25px 71.21%; } }
  @media (max-width: 991px) {
    .hospital-main-section2__group.layout {
      margin: 61px 22.73% 22px 71.21%; } }
  @media (max-width: 767px) {
    .hospital-main-section2__group.layout {
      margin: 47px 22.73% 18px 71.21%; } }
  @media (max-width: 575px) {
    .hospital-main-section2__group.layout {
      margin: 39px 22.73% 17px 71.21%; } }
  @media (max-width: 479px) {
    .hospital-main-section2__group.layout {
      margin: 32px 22.73% 15px 71.21%; } }
  @media (max-width: 383px) {
    .hospital-main-section2__group.layout {
      margin: 27px 22.73% 14px 71.21%; } }

.hospital-main-section2__image {
  background: var(--src) center center/contain no-repeat; }

.hospital-main-section2__image.layout {
  position: absolute;
  top: -94px;
  height: 96px;
  left: -56px;
  width: 58px; }

.hospital-main-section2__image1 {
  background: var(--src) center center/contain no-repeat; }

.hospital-main-section2__image1.layout {
  position: relative;
  height: 7px;
  width: 8px;
  min-width: 8px; }

.hospital-main-section2__group.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 69.38%;
  margin: 24px auto 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section2__group.layout1 {
      margin: 21px auto 0px; } }
  @media (max-width: 991px) {
    .hospital-main-section2__group.layout1 {
      margin: 18px auto 0px; } }
  @media (max-width: 767px) {
    .hospital-main-section2__group.layout1 {
      margin: 15px auto 0px; } }
  @media (max-width: 575px) {
    .hospital-main-section2__group.layout1 {
      margin: 14px auto 0px; } }
  @media (max-width: 479px) {
    .hospital-main-section2__group.layout1 {
      margin: 12px auto 0px; } }
  @media (max-width: 383px) {
    .hospital-main-section2__group.layout1 {
      margin: 11px auto 0px; } }

.hospital-main-section2__subtitle {
  display: flex;
  justify-content: flex-end;
  font: 700 22px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  text-align: right;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section2__subtitle {
      font-size: 21px;
      text-align: right; } }
  @media (max-width: 991px) {
    .hospital-main-section2__subtitle {
      font-size: 19px; } }
  @media (max-width: 767px) {
    .hospital-main-section2__subtitle {
      font-size: 18px; } }
  @media (max-width: 575px) {
    .hospital-main-section2__subtitle {
      font-size: 17px; } }
  @media (max-width: 383px) {
    .hospital-main-section2__subtitle {
      font-size: 16px; } }

.hospital-main-section2__subtitle.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 100%;
  margin: 0px 0px; }

.hospital-main-section2__decorator {
  background: var(--src) center center/contain no-repeat; }

.hospital-main-section2__decorator.layout {
  position: absolute;
  top: -82px;
  height: 58px;
  width: 135px;
  right: 36px; }

.hospital-main-section2__highlights2 {
  display: flex;
  justify-content: center;
  font: 16px/1.29 "Roboto", Helvetica, Arial, serif;
  color: #666666;
  text-align: center;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section2__highlights2 {
      font-size: 15px;
      text-align: center; } }
  @media (max-width: 991px) {
    .hospital-main-section2__highlights2 {
      font-size: 14px; } }
  @media (max-width: 767px) {
    .hospital-main-section2__highlights2 {
      font-size: 13px; } }
  @media (max-width: 479px) {
    .hospital-main-section2__highlights2 {
      font-size: 12px; } }

.hospital-main-section2__highlights2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 2px 29px 59px 35px; }
  @media (max-width: 1199px) {
    .hospital-main-section2__highlights2.layout {
      margin: 5px 25px 50px 30px; } }
  @media (max-width: 991px) {
    .hospital-main-section2__highlights2.layout {
      margin: 5px 22px 41px 26px; } }
  @media (max-width: 767px) {
    .hospital-main-section2__highlights2.layout {
      margin: 5px 18px 33px 21px; } }
  @media (max-width: 575px) {
    .hospital-main-section2__highlights2.layout {
      margin: 5px 17px 29px 19px; } }
  @media (max-width: 479px) {
    .hospital-main-section2__highlights2.layout {
      margin: 5px 15px 26px 17px; } }
  @media (max-width: 383px) {
    .hospital-main-section2__highlights2.layout {
      margin: 5px 14px 23px 16px; } }

.hospital-main-section2__flex5-spacer {
  flex: 0 1 80px; }
  @media (max-width: 991px) {
    .hospital-main-section2__flex5-spacer {
      display: none; } }

.hospital-main-section2__flex5-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 320px; }
  @media (max-width: 991px) {
    .hospital-main-section2__flex5-item1 {
      flex: 0 0 100%; } }

.hospital-main-section2__flex6 {
  display: flex;
  flex-direction: column; }

.hospital-main-section2__flex6.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 0px 11px; }
  @media (max-width: 1199px) {
    .hospital-main-section2__flex6.layout {
      margin: 0px 0px 10px; } }
  @media (max-width: 991px) {
    .hospital-main-section2__flex6.layout {
      margin: 0px 0px 8px; } }
  @media (max-width: 767px) {
    .hospital-main-section2__flex6.layout {
      margin: 0px 0px 7px; } }
  @media (max-width: 575px) {
    .hospital-main-section2__flex6.layout {
      margin: 0px 0px 6px; } }
  @media (max-width: 383px) {
    .hospital-main-section2__flex6.layout {
      margin: 0px 0px 5px; } }

.hospital-main-section2__icon {
  background: var(--src) center center/contain no-repeat;
  width: 100%;
  height: 100%; }

.hospital-main-section2__group.layout2 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 52px 0px 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section2__group.layout2 {
      margin: 44px 0px 0px; } }
  @media (max-width: 991px) {
    .hospital-main-section2__group.layout2 {
      margin: 36px 0px 0px; } }
  @media (max-width: 767px) {
    .hospital-main-section2__group.layout2 {
      margin: 29px 0px 0px; } }
  @media (max-width: 575px) {
    .hospital-main-section2__group.layout2 {
      margin: 25px 0px 0px; } }
  @media (max-width: 479px) {
    .hospital-main-section2__group.layout2 {
      margin: 22px 0px 0px; } }
  @media (max-width: 383px) {
    .hospital-main-section2__group.layout2 {
      margin: 20px 0px 0px; } }

.hospital-main-section2__big-title {
  font: 700 32px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section2__big-title {
      font-size: 29px;
      text-align: left; } }
  @media (max-width: 991px) {
    .hospital-main-section2__big-title {
      font-size: 25px; } }
  @media (max-width: 767px) {
    .hospital-main-section2__big-title {
      font-size: 23px; } }
  @media (max-width: 575px) {
    .hospital-main-section2__big-title {
      font-size: 21px; } }
  @media (max-width: 479px) {
    .hospital-main-section2__big-title {
      font-size: 20px; } }
  @media (max-width: 383px) {
    .hospital-main-section2__big-title {
      font-size: 19px; } }

.hospital-main-section2__big-title.layout {
  position: absolute;
  top: -102px;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 445px;
  right: -95px; }

.hospital-main-section2__content-box1 {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 1px 20px 1px rgba(0, 0, 0, 0.2);
  border-radius: 8px 8px 8px 8px; }

.hospital-main-section2__content-box1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.hospital-main-section2__image2 {
  background: var(--src) center center/contain no-repeat; }

.hospital-main-section2__image2.layout {
  position: relative;
  height: 115px;
  width: 121px;
  min-width: 121px;
  margin: 49px auto 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section2__image2.layout {
      margin: 42px auto 0px; } }
  @media (max-width: 991px) {
    .hospital-main-section2__image2.layout {
      margin: 34px auto 0px; } }
  @media (max-width: 767px) {
    .hospital-main-section2__image2.layout {
      margin: 27px auto 0px; } }
  @media (max-width: 575px) {
    .hospital-main-section2__image2.layout {
      margin: 24px auto 0px; } }
  @media (max-width: 479px) {
    .hospital-main-section2__image2.layout {
      margin: 21px auto 0px; } }
  @media (max-width: 383px) {
    .hospital-main-section2__image2.layout {
      margin: 18px auto 0px; } }

.hospital-main-section2__subtitle.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 73.13%;
  margin: 42px auto 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section2__subtitle.layout1 {
      margin: 36px auto 0px; } }
  @media (max-width: 991px) {
    .hospital-main-section2__subtitle.layout1 {
      margin: 30px auto 0px; } }
  @media (max-width: 767px) {
    .hospital-main-section2__subtitle.layout1 {
      margin: 24px auto 0px; } }
  @media (max-width: 575px) {
    .hospital-main-section2__subtitle.layout1 {
      margin: 22px auto 0px; } }
  @media (max-width: 479px) {
    .hospital-main-section2__subtitle.layout1 {
      margin: 19px auto 0px; } }
  @media (max-width: 383px) {
    .hospital-main-section2__subtitle.layout1 {
      margin: 17px auto 0px; } }

.hospital-main-section2__highlights2.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 3px 35px 50px 29px; }
  @media (max-width: 1199px) {
    .hospital-main-section2__highlights2.layout1 {
      margin: 5px 30px 43px 25px; } }
  @media (max-width: 991px) {
    .hospital-main-section2__highlights2.layout1 {
      margin: 5px 26px 35px 22px; } }
  @media (max-width: 767px) {
    .hospital-main-section2__highlights2.layout1 {
      margin: 5px 21px 28px 18px; } }
  @media (max-width: 575px) {
    .hospital-main-section2__highlights2.layout1 {
      margin: 5px 19px 24px 17px; } }
  @media (max-width: 479px) {
    .hospital-main-section2__highlights2.layout1 {
      margin: 5px 17px 21px 15px; } }
  @media (max-width: 383px) {
    .hospital-main-section2__highlights2.layout1 {
      margin: 5px 16px 19px 14px; } }

.hospital-main-section2__flex5-spacer1 {
  flex: 0 1 77px; }
  @media (max-width: 991px) {
    .hospital-main-section2__flex5-spacer1 {
      display: none; } }

.hospital-main-section2__flex5-item2 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 320px; }
  @media (max-width: 991px) {
    .hospital-main-section2__flex5-item2 {
      flex: 0 0 100%; } }

.hospital-main-section2__content-box {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 1px 20px 1px rgba(0, 0, 0, 0.2);
  border-radius: 8px 8px 8px 8px; }

.hospital-main-section2__content-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 102px 0px 11px; }
  @media (max-width: 1199px) {
    .hospital-main-section2__content-box.layout {
      margin: 84px 0px 10px; } }
  @media (max-width: 991px) {
    .hospital-main-section2__content-box.layout {
      margin: 65px 0px 8px; } }
  @media (max-width: 767px) {
    .hospital-main-section2__content-box.layout {
      margin: 49px 0px 7px; } }
  @media (max-width: 575px) {
    .hospital-main-section2__content-box.layout {
      margin: 40px 0px 6px; } }
  @media (max-width: 479px) {
    .hospital-main-section2__content-box.layout {
      margin: 32px 0px 6px; } }
  @media (max-width: 383px) {
    .hospital-main-section2__content-box.layout {
      margin: 27px 0px 5px; } }

.hospital-main-section2__image9 {
  background: var(--src) center center/contain no-repeat; }

.hospital-main-section2__image9.layout {
  position: relative;
  height: 143px;
  width: 41.56%;
  margin: 37px auto 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section2__image9.layout {
      margin: 32px auto 0px; } }
  @media (max-width: 991px) {
    .hospital-main-section2__image9.layout {
      margin: 27px auto 0px; } }
  @media (max-width: 767px) {
    .hospital-main-section2__image9.layout {
      margin: 22px auto 0px; } }
  @media (max-width: 575px) {
    .hospital-main-section2__image9.layout {
      margin: 20px auto 0px; } }
  @media (max-width: 479px) {
    .hospital-main-section2__image9.layout {
      margin: 18px auto 0px; } }
  @media (max-width: 383px) {
    .hospital-main-section2__image9.layout {
      margin: 16px auto 0px; } }

.hospital-main-section2__subtitle.layout2 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 41.88%;
  margin: 14px auto 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section2__subtitle.layout2 {
      margin: 12px auto 0px; } }
  @media (max-width: 991px) {
    .hospital-main-section2__subtitle.layout2 {
      margin: 10px auto 0px; } }
  @media (max-width: 767px) {
    .hospital-main-section2__subtitle.layout2 {
      margin: 9px auto 0px; } }
  @media (max-width: 575px) {
    .hospital-main-section2__subtitle.layout2 {
      margin: 8px auto 0px; } }
  @media (max-width: 479px) {
    .hospital-main-section2__subtitle.layout2 {
      margin: 7px auto 0px; } }

.hospital-main-section2__highlights2.layout2 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 5px 32px 60px; }
  @media (max-width: 1199px) {
    .hospital-main-section2__highlights2.layout2 {
      margin: 5px 28px 51px; } }
  @media (max-width: 991px) {
    .hospital-main-section2__highlights2.layout2 {
      margin: 5px 24px 42px; } }
  @media (max-width: 767px) {
    .hospital-main-section2__highlights2.layout2 {
      margin: 5px 20px 34px; } }
  @media (max-width: 575px) {
    .hospital-main-section2__highlights2.layout2 {
      margin: 5px 18px 30px; } }
  @media (max-width: 479px) {
    .hospital-main-section2__highlights2.layout2 {
      margin: 5px 16px 26px; } }
  @media (max-width: 383px) {
    .hospital-main-section2__highlights2.layout2 {
      margin: 5px 15px 23px; } }

.hospital-main-section3__section3 {
  display: flex;
  flex-direction: column; }

.hospital-main-section3__section3.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.hospital-main-section3__flex7 {
  display: flex;
  flex-direction: column; }

.hospital-main-section3__flex7.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 8px 35px; }
  @media (max-width: 1199px) {
    .hospital-main-section3__flex7.layout {
      margin: 7px 30px; } }
  @media (max-width: 991px) {
    .hospital-main-section3__flex7.layout {
      margin: 6px 26px; } }
  @media (max-width: 767px) {
    .hospital-main-section3__flex7.layout {
      margin: 5px 21px; } }
  @media (max-width: 575px) {
    .hospital-main-section3__flex7.layout {
      margin: 5px 19px; } }
  @media (max-width: 479px) {
    .hospital-main-section3__flex7.layout {
      margin: 5px 17px; } }
  @media (max-width: 383px) {
    .hospital-main-section3__flex7.layout {
      margin: 5px 16px; } }

@media (max-width: 1199px) {
  .hospital-main-section3__big-title-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 991px) {
  .hospital-main-section3__big-title-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 767px) {
  .hospital-main-section3__big-title-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 575px) {
  .hospital-main-section3__big-title-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 479px) {
  .hospital-main-section3__big-title-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 383px) {
  .hospital-main-section3__big-title-box {
    align-items: flex-start;
    justify-content: flex-start; } }

.hospital-main-section3__big-title-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 39.17%;
  margin: 23px 28.1% 0px 32.73%; }
  @media (max-width: 1199px) {
    .hospital-main-section3__big-title-box.layout {
      margin: 20px 28.1% 0px 32.73%; } }
  @media (max-width: 991px) {
    .hospital-main-section3__big-title-box.layout {
      margin: 17px 28.1% 0px 32.73%; } }
  @media (max-width: 767px) {
    .hospital-main-section3__big-title-box.layout {
      margin: 14px 28.1% 0px 32.73%; } }
  @media (max-width: 575px) {
    .hospital-main-section3__big-title-box.layout {
      margin: 13px 28.1% 0px 32.73%; } }
  @media (max-width: 479px) {
    .hospital-main-section3__big-title-box.layout {
      margin: 12px 28.1% 0px 32.73%; } }
  @media (max-width: 383px) {
    .hospital-main-section3__big-title-box.layout {
      margin: 11px 28.1% 0px 32.73%; } }

.hospital-main-section3__big-title {
  overflow: visible;
  margin-top: 0px;
  margin-bottom: 0px;
  margin: 0px;
  font: 700 32px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px;
  white-space: pre-wrap; }
  @media (max-width: 1199px) {
    .hospital-main-section3__big-title {
      font-size: 29px;
      text-align: left; } }
  @media (max-width: 991px) {
    .hospital-main-section3__big-title {
      font-size: 25px; } }
  @media (max-width: 767px) {
    .hospital-main-section3__big-title {
      font-size: 23px; } }
  @media (max-width: 575px) {
    .hospital-main-section3__big-title {
      font-size: 21px; } }
  @media (max-width: 479px) {
    .hospital-main-section3__big-title {
      font-size: 20px; } }
  @media (max-width: 383px) {
    .hospital-main-section3__big-title {
      font-size: 19px; } }

.hospital-main-section3__medium-title {
  display: flex;
  justify-content: center;
  font: 26px/1.5 "Lato", Helvetica, Arial, serif;
  color: #565656;
  text-align: center;
  letter-spacing: 0.78px; }
  @media (max-width: 1199px) {
    .hospital-main-section3__medium-title {
      font-size: 24px;
      text-align: center; } }
  @media (max-width: 991px) {
    .hospital-main-section3__medium-title {
      font-size: 21px; } }
  @media (max-width: 767px) {
    .hospital-main-section3__medium-title {
      font-size: 19px; } }
  @media (max-width: 575px) {
    .hospital-main-section3__medium-title {
      font-size: 18px; } }
  @media (max-width: 479px) {
    .hospital-main-section3__medium-title {
      font-size: 17px; } }

.hospital-main-section3__medium-title.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 59.5%;
  margin: 8px auto 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section3__medium-title.layout {
      margin: 7px auto 0px; } }
  @media (max-width: 991px) {
    .hospital-main-section3__medium-title.layout {
      margin: 6px auto 0px; } }
  @media (max-width: 767px) {
    .hospital-main-section3__medium-title.layout {
      width: 66.21%;
      margin: 5px auto 0px; } }
  @media (max-width: 575px) {
    .hospital-main-section3__medium-title.layout {
      width: 72.32%; } }
  @media (max-width: 479px) {
    .hospital-main-section3__medium-title.layout {
      width: 77.7%; } }
  @media (max-width: 383px) {
    .hospital-main-section3__medium-title.layout {
      width: 82.28%; } }

.hospital-main-section3__flex8 {
  display: flex; }
  @media (max-width: 383px) {
    .hospital-main-section3__flex8 {
      flex-wrap: wrap;
      row-gap: 16px; } }

.hospital-main-section3__flex8.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 87px 23px 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section3__flex8.layout {
      margin: 73px 20px 0px; } }
  @media (max-width: 991px) {
    .hospital-main-section3__flex8.layout {
      margin: 58px 17px 0px; } }
  @media (max-width: 767px) {
    .hospital-main-section3__flex8.layout {
      margin: 45px 14px 0px; } }
  @media (max-width: 575px) {
    .hospital-main-section3__flex8.layout {
      margin: 38px 13px 0px; } }
  @media (max-width: 479px) {
    .hospital-main-section3__flex8.layout {
      margin: 32px 12px 0px; } }
  @media (max-width: 383px) {
    .hospital-main-section3__flex8.layout {
      margin: 27px 11px 0px; } }

.hospital-main-section3__flex8-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 383px) {
    .hospital-main-section3__flex8-item {
      flex: 0 0 11.11111111111111%; } }

@media (max-width: 1199px) {
  .hospital-main-section3__subtitle1-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 991px) {
  .hospital-main-section3__subtitle1-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 767px) {
  .hospital-main-section3__subtitle1-box {
    align-items: flex-start;
    justify-content: flex-start; } }

@media (max-width: 479px) {
  .hospital-main-section3__subtitle1-box {
    align-items: flex-start;
    justify-content: flex-start; } }

.hospital-main-section3__subtitle1-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 0px 8px; }
  @media (max-width: 1199px) {
    .hospital-main-section3__subtitle1-box.layout {
      margin: 0px 0px 7px; } }
  @media (max-width: 991px) {
    .hospital-main-section3__subtitle1-box.layout {
      margin: 0px 0px 6px; } }
  @media (max-width: 767px) {
    .hospital-main-section3__subtitle1-box.layout {
      margin: 0px 0px 5px; } }

.hospital-main-section3__subtitle1 {
  overflow: visible;
  margin-top: 0px;
  margin-bottom: 0px;
  margin: 0px;
  font: 600 20px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  letter-spacing: 0.4px;
  white-space: pre-wrap; }
  @media (max-width: 1199px) {
    .hospital-main-section3__subtitle1 {
      font-size: 19px;
      text-align: left; } }
  @media (max-width: 991px) {
    .hospital-main-section3__subtitle1 {
      font-size: 18px; } }
  @media (max-width: 767px) {
    .hospital-main-section3__subtitle1 {
      font-size: 17px; } }
  @media (max-width: 479px) {
    .hospital-main-section3__subtitle1 {
      font-size: 16px; } }

.hospital-main-section3__flex8-spacer {
  flex: 0 1 62px; }
  @media (max-width: 383px) {
    .hospital-main-section3__flex8-spacer {
      flex: 0 0 11.11111111111111%; } }

.hospital-main-section3__flex8-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 35px; }
  @media (max-width: 383px) {
    .hospital-main-section3__flex8-item1 {
      flex: 0 0 11.11111111111111%; } }

.hospital-main-section3__image3 {
  background: var(--src) center center/contain no-repeat; }

.hospital-main-section3__image3.layout {
  position: relative;
  height: 30px;
  width: 35px;
  min-width: 35px;
  margin: 0px 0px 2px; }
  @media (max-width: 1199px) {
    .hospital-main-section3__image3.layout {
      margin: 0px 0px 5px; } }

.hospital-main-section3__flex8-spacer1 {
  flex: 0 1 23px; }
  @media (max-width: 383px) {
    .hospital-main-section3__flex8-spacer1 {
      flex: 0 0 11.11111111111111%; } }

.hospital-main-section3__flex8-item2 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 35px; }
  @media (max-width: 383px) {
    .hospital-main-section3__flex8-item2 {
      flex: 0 0 11.11111111111111%; } }

.hospital-main-section3__flex8-spacer2 {
  flex: 0 1 23px; }
  @media (max-width: 383px) {
    .hospital-main-section3__flex8-spacer2 {
      flex: 0 0 11.11111111111111%; } }

.hospital-main-section3__flex8-item3 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 35px; }
  @media (max-width: 383px) {
    .hospital-main-section3__flex8-item3 {
      flex: 0 0 11.11111111111111%; } }

.hospital-main-section3__image3.layout1 {
  position: relative;
  height: 30px;
  width: 35px;
  min-width: 35px;
  margin: 2px 0px 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section3__image3.layout1 {
      margin: 5px 0px 0px; } }

.hospital-main-section3__flex8-spacer3 {
  flex: 0 1 27px; }
  @media (max-width: 383px) {
    .hospital-main-section3__flex8-spacer3 {
      flex: 0 0 11.11111111111111%; } }

.hospital-main-section3__flex8-item4 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 35px; }
  @media (max-width: 383px) {
    .hospital-main-section3__flex8-item4 {
      flex: 0 0 11.11111111111111%; } }

.hospital-main-section3__image3.layout2 {
  position: relative;
  height: 30px;
  width: 35px;
  min-width: 35px;
  margin: 2px 0px 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section3__image3.layout2 {
      margin: 5px 0px 0px; } }

.hospital-main-section3__group {
  display: flex;
  flex-direction: column; }

.hospital-main-section3__group.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 14px 1px 0px 0px; }
  @media (max-width: 1199px) {
    .hospital-main-section3__group.layout {
      margin: 12px 5px 0px 0px; } }
  @media (max-width: 991px) {
    .hospital-main-section3__group.layout {
      margin: 10px 5px 0px 0px; } }
  @media (max-width: 767px) {
    .hospital-main-section3__group.layout {
      margin: 9px 5px 0px 0px; } }
  @media (max-width: 575px) {
    .hospital-main-section3__group.layout {
      margin: 8px 5px 0px 0px; } }
  @media (max-width: 479px) {
    .hospital-main-section3__group.layout {
      margin: 7px 5px 0px 0px; } }

.hospital-main-section3__box1 {
  background-color: #646168;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.247059);
  border-radius: 25px 25px 0px 0px; }

.hospital-main-section3__box1.layout {
  position: absolute;
  top: -65px;
  height: 160px;
  width: 1312px;
  right: -59px; }

.hospital-main-section3__small-paragraph-body-box {
  display: flex;
  justify-content: center; }

.hospital-main-section3__small-paragraph-body-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.hospital-main-section3__small-paragraph-body {
  overflow: visible;
  margin-top: 0px;
  margin-bottom: 0px;
  margin: 0px;
  font: 700 12px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  text-align: center;
  letter-spacing: 0px;
  white-space: pre-wrap; }


  a {
    text-decoration:none;
}

#v_report{
  position: relative;
  left: 200px;
  top: -75px;

}

  
    </style>
  </head>

  <body style="display: flex; flex-direction: column">
    <main class="hospital-main hospital-main-main layout">
      <!-- ======= section1 ======= --> 
      <section class="hospital-main-section1__section1 layout">
        <div class="hospital-main-section1__flex layout">
          <div class="hospital-main-section1__flex1 layout">
            <div class="hospital-main-section1__flex1-item">
              <!-- <div class="hospital-main-section1__group layout">
                <div
                  style="--src:url(../images/hospital/7dc134405341ed9e7642a3e861a8f5b0.png)"
                  class="hospital-main-section1__image10 layout"
                ></div>
                <div
                  style="--src:url(../images/hospital/18b2d10a45eb6a7342782cc2bafbc152.png)"
                  class="hospital-main-section1__image10 layout1"
                ></div>
                <div
                  style="--src:url(../images/hospital/cfb5b2e71cd945c4b79529628d26ac3a.png)"
                  class="hospital-main-section1__image11 layout"
                ></div>
                <div
                  style="--src:url(../images/hospital/bc757a30cbf5377e801e7371f23fa05b.png)"
                  class="hospital-main-section1__image12 layout"
                ></div>
              </div> -->
            </div>
            <div class="hospital-main-section1__flex1-spacer"></div>
            <div class="hospital-main-section1__flex1-item1">
              <!-- <h1 class="hospital-main-section1__big-title1 layout">GoodHealth</h1> -->
            </div>
            <div class="hospital-main-section1__flex1-spacer1"></div>
            <div class="hospital-main-section1__flex1-item2">
              <h3 class="hospital-main-section1__subtitle2 layout">Home</h3>
            </div>
            <div class="hospital-main-section1__flex1-spacer2"></div>
            <div class="hospital-main-section1__flex1-item3">
              <h3 class="hospital-main-section1__subtitle2 layout">About Us</h3>
            </div>
            <div class="hospital-main-section1__flex1-spacer3"></div>
            <div class="hospital-main-section1__flex1-item4">
              <a href="/hosp_login"><h3 class="hospital-main-section1__subtitle2 layout">Logout</h3></a>
            </div>
          </div>
          
 <style type="text/css">
   table.a {
  table-layout: auto;
  width: 100%;   

}

.icon-red {
  color: blue;
}
a {
    text-decoration:none;
}

.fotters{
	color: #9F9F9F;
	background: #202020;
	text-align: center;
	font-size: 11px;
	padding: 20px 0;
	margin-top: 20px;
	}
  
 
   </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">       

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="main mt-4 mb-2">
    <div class="content-wrapper">
        <div class="container-sm">
            <div class="row">
                <div class="col-md-12">


                <br><br><br>

                        <h2 class="page-title">Claim Details</h2>
                        <hr>

                        <div class="card" align="center">
						<br><br>

<div align="center">
<select id="year" type="dropdown-toggle" class="form-control  btn btn-secondary dropdown-toggle" name="year" style="width:130px">
<option value="">select year </option>
@foreach($year2 as $year2)
<option value="{{$year2->hc_date_yr}}">{{$year2->hc_date_yr}}</option>
@endforeach
</select>

<select id="dis_type" type="dropdown-toggle" class="form-control  btn btn-secondary dropdown-toggle" name="year" style="width:130px">
<option value="">select disease_type </option>
@foreach($dis_ty as $dis_ty)
<option value="{{$dis_ty->hc_desc_dis}}">{{$dis_ty->hc_desc_dis}}</option>
@endforeach
</select>

<script>
 document.getElementById("dis_type").onchange = function(){
    var value = document.getElementById("year").value;
    var value1 = document.getElementById("dis_type").value;
	window.location.href = '/report1' +value+'/'+value1;
 };
</script>

@if (session('report1_sess'))
<label ><h4><b>-----Select type of chart-----</h4></b></label>
 <select name ="chart"  id="chart" onchange="myfunction()" class="form-control  btn btn-secondary dropdown-toggle" style="width:120px;">
    <option value="pie">PIE</option>
    <option value="column">COLUMN</option>
    <option value="pyramid">PYRAMID</option>
    <option value="bar">BAR</option>
    <option value="line">LINE</option>
    <option value="area">AREA</option>
</select>

<button id="exportChart" class=" btn btn-secondary ">Export Chart</button>

<br><br>

<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Per-Month data "
	},
	axisY: {
		title: "TOTAL_CLAIMS"
	},
	data: [{        
		type:"column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "total claims",
        indexLabel:"{label} ({y})",
		dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();


document.getElementById("exportChart").addEventListener("click",function(){
    	chart.exportChart({format: "jpg"});
    }); 

}


function myfunction(){

var chartype=document.getElementById("chart").value;

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Per-Month data "
	},
	axisY: {
		title: "TOTAL_CLAIMS"
	},
	data: [{        
		type: chartype ,//"column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "total claims",
        indexLabel:"{label} ({y})",
		dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();


document.getElementById("exportChart").addEventListener("click",function(){
    	chart.exportChart({format: "jpg"});
    }); 

}
//window.onload = function () {
    
</script>


<br><br><br><br><br><br>
</div>
        </div>
        </div>
        </div>
        </div>
        <br><br>
        
<div class="container-fluid">
 

 <div class="card shadow mb-4">

         <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-danger">Claim Data</h6>

         </div>
     <div class="card-body">
         <div class="table-responsive" style="overflow:scroll; height:85vh;">
         <div id="tab" align="center">

<table class="table-bordered a" id="dataTable" width="100%" cellspacing="0">
                        <thead align="center" >
                            <tr height="60px">
                                <th scope="col">Claim_id</th>
                                <th scope="col">Diseses type</th>
                                <th scope="col">Customer Id</th>
                                <th scope="col">Cover Id</th>
                                <th scope="col">Start date</th>
                                <th scope="col">End date</th>
                                <th scope="col">Timestamp</th>


                            </tr>
                        </thead>
                        <tfoot align="center">
                        <tr height="60px">
                    
                                <th scope="col">Claim_id</th>
                                <th scope="col">Diseses type</th>
                                <th scope="col">Customer Id</th>
                                <th scope="col">Cover Id</th>
                                <th scope="col">Start date</th>
                                <th scope="col">End date</th>
                                <th scope="col">Timestamp</th>
                        </tr>
                        </tfoot>
                        <tbody align="center">
                        @foreach($top_idea_report as $top_idea_report)
                        <tr height="60px">
                        <td>{{$top_idea_report->hc_id}}</td>
                        <td>{{$top_idea_report->hc_desc}}</td>
                        <td>{{$top_idea_report->hc_cid}}</td>
                        <td>{{$top_idea_report->hc_cvid}}</td>
                        <td>{{$top_idea_report->hc_sdt}}</td>
                        <td>{{$top_idea_report->hc_edt}}</td>
                        <td>{{$top_idea_report->hc_date}}</td>
                        </tr>
                        @endforeach
        
                        </tbody>
                </table>
              <br>
              <br>
                </div>
        </div>
        <br>
        <p align="center">
        <input class="btn btn-primary" type="button" value="Print PDF" 
            id="btPrint" onclick="createPDF()" />
    </p>
    </div>
                </div>  
            </div>
</body>
</div>
<script>
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
       // <title> FOR PDF HEADER.
         
        win.document.write('</head>');
        win.document.write('<body>');
      
        win.document.write('<img style="display: block; margin-left: auto; margin-right: auto;" src="../images/spitlogo.jpg"/>');
        win.document.write(' <h2 style="text-align: center;">Bharatiya Vidya Bhavans</h2>');
        win.document.write(' <h2 style="text-align: center;">Sardar Patel Institute of Technology</h2>');

        win.document.write(' <div class="container"><hr></div>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script> 

@endif

            <div class="hospital-main-section1__flex2-spacer"></div>
            <div class="hospital-main-section1__flex2-item1">
              <!-- <div
                style="--src:url(../images/hospital/7c31b9b9d4e0eff9df3c1311651f339c.png)"
                class="hospital-main-section1__image4 layout"
              ></div> -->
            </div>
          </div>
          <div class="hospital-main-section1__flex4 layout">
            <div class="hospital-main-section1__flex4-item">
              <div
                style="--src:url(../images/hospital/8e319f9b1d88fce44277960bc9505e9e.png)"
                class="hospital-main-section1__image5 layout"
              ></div>
            </div>
            <div class="hospital-main-section1__flex4-item1">
              <div
                style="--src:url(../images/hospital/531202c81e4043f932afef9405d90ca2.png)"
                class="hospital-main-section1__image6 layout"
              ></div>
            </div>
            <div class="hospital-main-section1__flex4-item2">
              <div class="hospital-main-section1__group layout1">
                <div class="hospital-main-section1__text-body layout">
                  Trusted By Over 100+ Health Insurance companies
                </div>
                <div
                  style="--src:url(../images/hospital/1f0682f3d9a319ce9da407d4b2567498.png)"
                  class="hospital-main-section1__image7 layout"
                ></div>
              </div>
            </div>
            <div class="hospital-main-section1__flex4-spacer"></div>
            <div class="hospital-main-section1__flex4-item3">
              <div
                style="--src:url(../images/hospital/c3893528662c47f31c1273ca6e5e157f.png)"
                class="hospital-main-section1__image8 layout"
              ></div>
            </div>
          </div>
        </div>
      </section>
      <comment content="======= End section1 =======" break="true"></comment
      ><!-- ======= section2 ======= --> 
      <section class="hospital-main-section2__section2 layout">
        <div class="hospital-main-section2__flex5 layout">
          <div class="hospital-main-section2__flex5-item">
            <div class="hospital-main-section2__content-box2 layout">
              <div class="hospital-main-section2__block2 layout">
                <div class="hospital-main-section2__group layout">
                  <div
                    style="--src:url(../images/hospital/3f979b77d81420fb787f8125dc432511.png)"
                    class="hospital-main-section2__image layout"
                  ></div>
                  <div
                    style="--src:url(../images/hospital/bd774ece4fc01f1cc3fb37c8eb0ef419.png)"
                    class="hospital-main-section2__image1 layout"
                  ></div>
                </div>
              </div>
              <div class="hospital-main-section2__group layout1">
                <h3 class="hospital-main-section2__subtitle layout">Symptom Checker</h3>
                <div
                  style="--src:url(../images/hospital/8d427b371932789c5fb810f3d83d733e.png)"
                  class="hospital-main-section2__decorator layout"
                ></div>
              </div>
              <h5 class="hospital-main-section2__highlights2 layout">
                Check if you are infected by COVID-19 with our Symptom Checker
              </h5>
            </div>
          </div>
          <div class="hospital-main-section2__flex5-spacer"></div>
          <div class="hospital-main-section2__flex5-item1">
            <div class="hospital-main-section2__flex6 layout">
              <px-posize x="109fr 50px 161fr" y="0px 50px 0px"
                ><div
                  class="hospital-main-section2__icon"
                  style="--src:url(../images/hospital/9772b20037e6941cff76740e73a8c187.png)"
                ></div
              ></px-posize>
              <div class="hospital-main-section2__group layout2">
                <h1 class="hospital-main-section2__big-title layout">Health Care At your Fingertips</h1>
                <div class="hospital-main-section2__content-box1 layout">
                  <div
                    style="--src:url(../images/hospital/f9dc1d21b1899f86b3a6bf958ec83e44.png)"
                    class="hospital-main-section2__image2 layout"
                  ></div>
                  <h3 class="hospital-main-section2__subtitle layout1">24x7 Medical support</h3>
                  <h5 class="hospital-main-section2__highlights2 layout1">
                    Consult with 10,00+ health workers about concerns
                  </h5>
                </div>
              </div>
            </div>
          </div>
          <div class="hospital-main-section2__flex5-spacer1"></div>
          <div class="hospital-main-section2__flex5-item2">
            <div class="hospital-main-section2__content-box layout">
              <div
                style="--src:url(../images/hospital/5e4fedcb9e4a9a4f50848f47659fa999.png)"
                class="hospital-main-section2__image9 layout"
              ></div>
              <h3 class="hospital-main-section2__subtitle layout2">Conditions</h3>
              <h5 class="hospital-main-section2__highlights2 layout2">
                Bringing premium healthcare features to your fingertips
              </h5>
            </div>
          </div>
        </div>
      </section>
      <comment content="======= End section2 =======" break="true"></comment
      ><!-- ======= section3 ======= --> 
      <section class="hospital-main-section3__section3 layout">
        <div class="hospital-main-section3__flex7 layout">
          <h1 class="hospital-main-section3__big-title-box layout">
            <pre class="hospital-main-section3__big-title">
               You’re always 
     on your phone and now, 
                  so are we</pre
            >
          </h1>
          <h2 class="hospital-main-section3__medium-title layout">
            Get easy access to quality healthcare and manage your medical needs at the clcik of a button
          </h2>
          <div class="hospital-main-section3__flex8 layout">
            <div class="hospital-main-section3__flex8-item">
              <h3 class="hospital-main-section3__subtitle1-box layout">
                <pre class="hospital-main-section3__subtitle1">
Contact Us -
</pre
                >
              </h3>
            </div>
            <div class="hospital-main-section3__flex8-spacer"></div>
            <div class="hospital-main-section3__flex8-item1">
              <div
                style="--src:url(../images/hospital/c69d7bd4a4026d8bddff32f6324d22b8.png)"
                class="hospital-main-section3__image3 layout"
              ></div>
            </div>
            <div class="hospital-main-section3__flex8-spacer1"></div>
            <div class="hospital-main-section3__flex8-item2">
              <div
                style="--src:url(../images/hospital/63d176ca874c07301ba173cad0412041.png)"
                class="hospital-main-section3__image3 layout"
              ></div>
            </div>
            <div class="hospital-main-section3__flex8-spacer2"></div>
            <div class="hospital-main-section3__flex8-item3">
              <div
                style="--src:url(../images/hospital/cc2cd95edd573fa0b752f11eb367dfe8.png)"
                class="hospital-main-section3__image3 layout1"
              ></div>
            </div>
            <div class="hospital-main-section3__flex8-spacer3"></div>
            <div class="hospital-main-section3__flex8-item4">
              <div
                style="--src:url(../images/hospital/5eb42f3f6f867cce10177cb12732ecb5.png)"
                class="hospital-main-section3__image3 layout2"
              ></div>
            </div>
          </div>
          <div class="hospital-main-section3__group layout">
            <div class="hospital-main-section3__box1 layout"></div>
            <div class="hospital-main-section3__small-paragraph-body-box layout">
              <pre class="hospital-main-section3__small-paragraph-body">
**Discount is offered by the Insurance company as approved by IRDAI for the product under File &amp; Use guidelines
#On the basis of your profile
Lifegood is now registered as a Direct Broker |Registration No. 000, Registration Code No. IRDA/ DB 000/ 00, Valid till 09/06/2024, License category- Direct Broker (Life &amp; General)| Visitors are hereby informed that their information submitted on the website may be shared with insurers.Product information is authentic and solely based on the information received from the insurers.

© Copyright 2022-2025 | Lifegood.com. All Rights Reserved.</pre
              >
            </div>
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

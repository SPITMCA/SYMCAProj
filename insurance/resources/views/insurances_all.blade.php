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
    <link rel="stylesheet" type="text/css" href="/css/Insuranceall.css" />

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
.insuranceall-block {
  display: flex;
  flex-direction: column;
  background-color: white; }

.insuranceall-block.layout {
  position: relative;
  overflow: hidden;
  min-height: 1513px;
  flex-shrink: 0; }

.insuranceall-flex {
  display: flex;
  flex-direction: column; }

.insuranceall-flex.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 8px 28px; }

.insuranceall-flex1 {
  display: flex; }

.insuranceall-flex1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 89.46%;
  margin: 29px 3.92% 0px 6.62%; }

.insuranceall-flex1-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 32px; }

.insuranceall-group {
  display: flex;
  flex-direction: column; }

.insuranceall-group.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 9px 0px 8px; }

.insuranceall-image1 {
  background: var(--src) center center/contain no-repeat; }

.insuranceall-image1.layout {
  position: absolute;
  top: 0px;
  height: 20px;
  left: -28px;
  width: 32px; }

.insuranceall-image1.layout1 {
  position: relative;
  height: 20px;
  width: 32px;
  min-width: 32px; }

.insuranceall-flex1-spacer {
  flex: 0 1 2px; }

.insuranceall-flex1-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 142px; }

.insuranceall-group1 {
  display: flex;
  flex-direction: column;
  cursor: pointer; }

.insuranceall-group1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 0px 1px; }

.insuranceall-big-title {
  font: 900 30px/1.2 "Bodoni Moda", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px; }

.insuranceall-big-title.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.insuranceall-group.layout1 {
  position: absolute;
  top: -4px;
  height: 31px;
  left: -36px;
  width: 19px; }

.insuranceall-image {
  background: var(--src) center center/contain no-repeat; }

.insuranceall-image.layout {
  position: absolute;
  top: 0px;
  height: 31px;
  left: -10px;
  width: 19px; }

.insuranceall-image.layout1 {
  position: relative;
  height: 31px;
  width: 19px;
  min-width: 19px; }

.insuranceall-flex1-spacer1 {
  flex: 0 1 608px; }

.insuranceall-subtitle {
  font: 700 20px/1.2 "Lato", Helvetica, Arial, serif;
  color: #222222;
  letter-spacing: 0px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }

.insuranceall-subtitle:hover {
  transform: scale(0.9); }

.insuranceall-subtitle.layout {
  position: relative;
  flex: 0 0 auto;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 13px 0px 0px; }

.insuranceall-flex1-spacer2 {
  flex: 0 1 54px; }

.insuranceall-flex1-spacer3 {
  flex: 0 1 54px; }

.insuranceall-big-title1-box {
  display: flex;
  justify-content: flex-end; }

.insuranceall-big-title1-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 35.29%;
  margin: 83px auto 23px; }

.insuranceall-big-title1 {
  overflow: visible;
  margin-top: 0px;
  margin-bottom: 0px;
  margin: 0px;
  font: 700 32px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  text-align: right;
  letter-spacing: 0px;
  white-space: pre-wrap; }

.insuranceall-flex2 {
  display: flex; }

.insuranceall-flex2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 50px 33px 12px 34px; }

.insuranceall-flex2-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 254px; }

.insuranceall-block1 {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.247059);
  border-radius: 8px 8px 8px 8px; }

.insuranceall-block1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 0px 2px; }

.insuranceall-image9 {
  background: var(--src) center center/cover no-repeat; }

.insuranceall-image9.layout {
  position: relative;
  height: 171px; }

.insuranceall-subtitle1 {
    font: 700 22px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px;
text-align: center; }

.insuranceall-subtitle1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 59.06%;
  margin: 46px auto 0px; }

.insuranceall-cover-block7 {
  display: flex;
  flex-direction: column;
  background-color: #6432a4;
  border-radius: 5px 5px 5px 5px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }

.insuranceall-cover-block7:hover {
  transform: scale(0.9); }

.insuranceall-cover-block7.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 16px 19px 21px 33px; }

.insuranceall-highlights1 {
  font: 600 16px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  letter-spacing: 0.32px; }

.insuranceall-highlights1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 17px 31px 22px; }

.insuranceall-block1-spacer {
  flex: 0 1 45px; }

.insuranceall-block1-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 252px; }

.insuranceall-group.layout4 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 0px 171px; }

.insuranceall-group.layout3 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.insuranceall-content-box {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 1px 20px 1px rgba(0, 0, 0, 0.2);
  border-radius: 8px 8px 8px 8px; }

.insuranceall-content-box.layout {
  position: absolute;
  height: 339px;
  bottom: -171px;
  width: 260px;
  right: -6px; }

.insuranceall-subtitle11 {
  font: 700 22px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px; }

.insuranceall-subtitle11.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 106px;
  min-width: 106px;
  margin: 214px auto 0px; }

.insuranceall-cover-block {
  display: flex;
  flex-direction: column;
  background-color: #6432a4;
  border-radius: 5px 5px 5px 5px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }

.insuranceall-cover-block:hover {
  transform: scale(0.9); }

.insuranceall-cover-block.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 16px 24px 22px 26px; }

.insuranceall-highlights11 {
  display: flex;
  justify-content: flex-end;
  font: 600 16px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  text-align: right;
  letter-spacing: 0.32px; }

.insuranceall-highlights11.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 17px 39px 23px; }

.insuranceall-image8 {
  background: var(--src) center center/cover no-repeat; }

.insuranceall-image8.layout {
  position: relative;
  height: 171px; }

.insuranceall-content-box-spacer {
  flex: 0 1 44px; }

.insuranceall-content-box-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 260px; }

.insuranceall-content-box1 {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 1px 20px 1px rgba(0, 0, 0, 0.2);
  border-radius: 8px 8px 8px 8px; }

.insuranceall-content-box1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 3px 0px 0px; }

.insuranceall-image7 {
  background: var(--src) center center/contain no-repeat; }

.insuranceall-image7.layout {
  position: relative;
  height: 90px;
  margin: 38px 23px 0px 24px; }

.insuranceall-subtitle12 {
  font: 700 22px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px;
  text-align: center; }

.insuranceall-subtitle12.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 86px 30px 0px 33px; }

.insuranceall-cover-block1 {
  display: flex;
  flex-direction: column;
  background-color: #6432a4;
  border-radius: 5px 5px 5px 5px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }

.insuranceall-cover-block1:hover {
  transform: scale(0.9); }

.insuranceall-cover-block1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 15px 23px 23px 24px; }

.insuranceall-highlights12 {
  display: flex;
  justify-content: flex-end;
  font: 600 16px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  text-align: right;
  letter-spacing: 0.32px; }

.insuranceall-highlights12.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 60.56%;
  margin: 15px auto 25px; }

.insuranceall-content-box1-spacer {
  flex: 0 1 42px; }

.insuranceall-content-box1-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 260px; }

.insuranceall-content-box2 {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 1px 20px 1px rgba(0, 0, 0, 0.2);
  border-radius: 8px 8px 8px 8px; }

.insuranceall-content-box2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 2px 0px 1px; }

.insuranceall-image6 {
  background: var(--src) center center/contain no-repeat; }

.insuranceall-image6.layout {
  position: relative;
  height: 110px;
  margin: 39px 17px 0px 16px; }

.insuranceall-subtitle13 {
  font: 700 22px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px; }

.insuranceall-subtitle13.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 50.77%;
  margin: 66px auto 0px; }

.insuranceall-cover-block2 {
  display: flex;
  flex-direction: column;
  background-color: #6432a4;
  border-radius: 5px 5px 5px 5px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }

.insuranceall-cover-block2:hover {
  transform: scale(0.9); }

.insuranceall-cover-block2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 16px 25px 21px 13px; }

.insuranceall-highlights13 {
  display: flex;
  justify-content: flex-end;
  font: 600 16px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  text-align: right;
  letter-spacing: 0.32px; }

.insuranceall-highlights13.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 18px 36px 22px; }

.insuranceall-flex3 {
  display: flex; }

.insuranceall-flex3.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 26px 35px 51px; }

.insuranceall-flex3-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 260px; }

.insuranceall-content-box3 {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 1px 20px 1px rgba(0, 0, 0, 0.2);
  border-radius: 8px 8px 8px 8px; }

.insuranceall-content-box3.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.insuranceall-image5 {
  background: var(--src) center center/contain no-repeat; }

.insuranceall-image5.layout {
  position: relative;
  height: 133px;
  margin: 28px 16px 0px 22px; }

.insuranceall-subtitle14 {
  font: 700 22px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px; 
  text-align: center;}

.insuranceall-subtitle14.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 67px 20px 0px 26px; }

.insuranceall-cover-block3 {
  display: flex;
  flex-direction: column;
  background-color: #6432a4;
  border-radius: 5px 5px 5px 5px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }

.insuranceall-cover-block3:hover {
  transform: scale(0.9); }

.insuranceall-cover-block3.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 15px 31px 14px 18px; }

.insuranceall-highlights14 {
  display: flex;
  justify-content: flex-end;
  font: 600 16px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  text-align: right;
  letter-spacing: 0.32px; }

.insuranceall-highlights14.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 14px 38px 21px; }

.insuranceall-content-box3-spacer {
  flex: 0 1 38px; }

.insuranceall-content-box3-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 260px; }

.insuranceall-content-box4 {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 1px 20px 1px rgba(0, 0, 0, 0.2);
  border-radius: 8px 8px 8px 8px; }

.insuranceall-content-box4.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.insuranceall-image4 {
  background: var(--src) center center/contain no-repeat; }

.insuranceall-image4.layout {
  position: relative;
  height: 167px;
  width: 63.08%;
  margin: 12px 20% 0px 16.92%; }

.insuranceall-subtitle1.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 96px;
  min-width: 96px;
  margin: 50px auto 0px; }

.insuranceall-cover-block4 {
  display: flex;
  flex-direction: column;
  background-color: #6432a4;
  border-radius: 5px 5px 5px 5px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }

.insuranceall-cover-block4:hover {
  transform: scale(0.9); }

.insuranceall-cover-block4.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 14px 24px; }

.insuranceall-highlights15 {
  display: flex;
  justify-content: flex-end;
  font: 600 16px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  text-align: right;
  letter-spacing: 0.32px; }

.insuranceall-highlights15.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 15px 35px 20px; }

.insuranceall-content-box4-spacer {
  flex: 0 1 36px; }

.insuranceall-content-box4-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 260px; }

.insuranceall-content-box5 {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 1px 20px 1px rgba(0, 0, 0, 0.2);
  border-radius: 8px 8px 8px 8px; }

.insuranceall-content-box5.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.insuranceall-image3 {
  background: var(--src) center center/contain no-repeat; }

.insuranceall-image3.layout {
  position: relative;
  height: 151px;
  margin: 22px 19px 0px 34px; }

.insuranceall-subtitle1.layout2 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 47px 36px 0px; }

.insuranceall-cover-block5 {
  display: flex;
  flex-direction: column;
  background-color: #6432a4;
  border-radius: 5px 5px 5px 5px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }

.insuranceall-cover-block5:hover {
  transform: scale(0.9); }

.insuranceall-cover-block5.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 22px 26px 15px; }

.insuranceall-highlights16 {
  display: flex;
  justify-content: flex-end;
  font: 600 16px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  text-align: right;
  letter-spacing: 0.32px; }

.insuranceall-highlights16.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 16px 33px 19px; }

.insuranceall-content-box5-spacer {
  flex: 0 1 35px; }

.insuranceall-content-box5-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 260px; }

.insuranceall-content-box6 {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 1px 20px 1px rgba(0, 0, 0, 0.2);
  border-radius: 8px 8px 8px 8px; }

.insuranceall-content-box6.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.insuranceall-image2 {
  background: var(--src) center center/contain no-repeat; }

.insuranceall-image2.layout {
  position: relative;
  height: 122px;
  margin: 48px 18px 0px 36px; }

.insuranceall-subtitle1.layout3 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 112px;
  min-width: 112px;
  margin: 59px auto 0px; }

.insuranceall-cover-block6 {
  display: flex;
  flex-direction: column;
  background-color: #6432a4;
  border-radius: 5px 5px 5px 5px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }

.insuranceall-cover-block6:hover {
  transform: scale(0.9); }

.insuranceall-cover-block6.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 14px 18px 14px 20px; }

.insuranceall-highlights17 {
  display: flex;
  justify-content: flex-end;
  font: 600 16px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  text-align: right;
  letter-spacing: 0.32px; }

.insuranceall-highlights17.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 61.26%;
  margin: 16px auto 19px; }

.insuranceall-flex4 {
  display: flex;
  flex-direction: column; }

.insuranceall-flex4.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 64.46%;
  margin: 54px 16.18% 24px 19.36%; }

.insuranceall-flex5 {
  display: flex;
  flex-direction: column; }

.insuranceall-flex5.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.insuranceall-big-title11 {
  font: 700 32px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px; }

.insuranceall-big-title11.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 61.47%;
  margin: 0px auto; }

.insuranceall-highlights {
  display: flex;
  justify-content: center;
  font: 16px/1.5 "Lato", Helvetica, Arial, serif;
  color: #565656;
  text-align: center;
  letter-spacing: 0.48px; }

.insuranceall-highlights.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 33px 0px 0px; }

.insuranceall-flex6 {
  display: flex;
  flex-direction: column; }

.insuranceall-flex6.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 63px 48px 0px 0px; }

.insuranceall-group.layout2 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 23px; }

.insuranceall-box10 {
  background-color: #646168;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.247059);
  border-radius: 25px 25px 0px 0px; }

.insuranceall-box10.layout {
  position: absolute;
  height: 160px;
  bottom: -109px;
  width: 1312px;
  right: -82px; }

.insuranceall-flex7 {
  display: flex; }

.insuranceall-flex7.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.insuranceall-subtitle2-box.layout {
  position: relative;
  flex: 0 0 auto;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 0px 8px; }

.insuranceall-subtitle2 {
  overflow: visible;
  margin-top: 0px;
  margin-bottom: 0px;
  margin: 0px;
  font: 600 20px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  letter-spacing: 0.4px;
  white-space: pre-wrap; }

.insuranceall-flex7-spacer {
  flex: 0 1 62px; }

.insuranceall-flex7-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 35px; }

.insuranceall-image10 {
  background: var(--src) center center/cover no-repeat;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }

.insuranceall-image10:hover {
  transform: scale(0.9); }

.insuranceall-image10.layout {
  position: relative;
  height: 30px;
  width: 35px;
  min-width: 35px;
  margin: 0px 0px 2px; }

.insuranceall-flex7-spacer1 {
  flex: 0 1 23px; }

.insuranceall-flex7-spacer2 {
  flex: 0 1 23px; }

.insuranceall-image10.layout1 {
  position: relative;
  height: 30px;
  width: 35px;
  min-width: 35px;
  margin: 2px 0px 0px; }

.insuranceall-flex7-spacer3 {
  flex: 0 1 27px; }

.insuranceall-image10.layout2 {
  position: relative;
  height: 30px;
  width: 35px;
  min-width: 35px;
  margin: 2px 0px 0px; }

.insuranceall-small-paragraph-body-box {
  display: flex;
  justify-content: center; }

.insuranceall-small-paragraph-body-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 14px 0px 0px; }

.insuranceall-small-paragraph-body {
  overflow: visible;
  margin-top: 0px;
  margin-bottom: 0px;
  margin: 0px;
  font: 700 12px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  text-align: center;
  letter-spacing: 0px;
  white-space: pre-wrap; }

  
  
a{
    text-decoration:none;
}


    </style>
  </head>

  <body style="display: flex; flex-direction: column">
    <div class="insuranceall insuranceall-block layout">
      <div class="insuranceall-flex layout">
        <div class="insuranceall-flex1 layout">
          <div class="insuranceall-flex1-item">
            <div class="insuranceall-group layout">
              <div
                style="--src:url(../images/ffab9d54bb60f80e3e16861b94d1ade8.png)"
                class="insuranceall-image1 layout"
              ></div>
              <div
                style="--src:url(../images/c4ab2d7b9d3561225c6ce4c91a451493.png)"
                class="insuranceall-image1 layout1"
              ></div>
            </div>
          </div>
          <div class="insuranceall-flex1-spacer"></div>
          <div class="insuranceall-flex1-item1">
            <div class="insuranceall-group1 layout">
              <h1 class="insuranceall-big-title layout">Lifegood</h1>
              <div class="insuranceall-group layout1">
                <div
                  style="--src:url(../images/5f60dd4f7084db8211286a3ba16e844f.png)"
                  class="insuranceall-image layout"
                ></div>
                <div
                  style="--src:url(../images/65846c14948ef554d56f2ad1ddea867d.png)"
                  class="insuranceall-image layout1"
                ></div>
              </div>
            </div>
          </div>
          <div class="insuranceall-flex1-spacer1"></div>
          <h3 class="insuranceall-subtitle layout">Home</h3>
          <div class="insuranceall-flex1-spacer2"></div>
          <h3 class="insuranceall-subtitle layout">About Us</h3>
          <div class="insuranceall-flex1-spacer3"></div>
          <h3 class="insuranceall-subtitle layout">Logout</h3>
        </div>
        <h1
          class="insuranceall-big-title1-box layout"
          data-aos="fade-down"
          data-aos-delay="1000"
        >
          <pre class="insuranceall-big-title1">
Available Health Insurances
</pre
          >
        </h1>
        <div class="insuranceall-flex2 layout">
          <div class="insuranceall-flex2-item">
            <div
              class="insuranceall-block1 layout"
              data-aos="fade-right"
              data-aos-delay="1000"
              data-aos-duration="1000"
            >
              <div
                style="--src:url(../images/aaefa50948bee4e84e637940fdfa5174.png)"
                class="insuranceall-image9 layout"
              ></div>
              <h3 class="insuranceall-subtitle1 layout">STAR</h3>
              <div class="insuranceall-cover-block7 layout">
                <a href="/star_ins"><h5 class="insuranceall-highlights1 layout">VIEW SCHEMES</h5></a>
              </div>
            </div>
          </div>
          <div class="insuranceall-block1-spacer"></div>
          <div class="insuranceall-block1-item">
            <div class="insuranceall-group layout4">
              <div class="insuranceall-group layout3">
                <div
                  class="insuranceall-content-box layout"
                  data-aos="fade-right"
                  data-aos-delay="1000"
                  data-aos-duration="1000"
                >
                  <h3 class="insuranceall-subtitle11 layout">TATA AIA</h3>
                  <div class="insuranceall-cover-block layout">
                    <h5 class="insuranceall-highlights11 layout">
                      VIEW SCHEMES
                    </h5>
                  </div>
                </div>
                <div
                  style="--src:url(../images/0b3b40b0a9a285ec54a366d252ea8c74.png)"
                  class="insuranceall-image8 layout"
                  data-aos="fade-right"
                  data-aos-delay="1000"
                  data-aos-duration="1000"
                ></div>
              </div>
            </div>
          </div>
          <div class="insuranceall-content-box-spacer"></div>
          <div class="insuranceall-content-box-item">
            <div
              class="insuranceall-content-box1 layout"
              data-aos="fade-right"
              data-aos-delay="1000"
              data-aos-duration="1000"
              data-aos-easing="ease-out"
            >
              <div
                style="--src:url(../images/eb5ec2c61575e56b8625946aba596024.png)"
                class="insuranceall-image7 layout"
              ></div>
              <h3 class="insuranceall-subtitle12 layout">ICICI</h3>
              <div class="insuranceall-cover-block1 layout">
                <h5 class="insuranceall-highlights12 layout">VIEW SCHEMES</h5>
              </div>
            </div>
          </div>
          <div class="insuranceall-content-box1-spacer"></div>
          <div class="insuranceall-content-box1-item">
            <div
              class="insuranceall-content-box2 layout"
              data-aos="fade-right"
              data-aos-delay="1000"
              data-aos-duration="1000"
            >
              <div
                style="--src:url(../images/23037c921f86b2b1959aad581647efe9.png)"
                class="insuranceall-image6 layout"
              ></div>
              <h3 class="insuranceall-subtitle13 layout">HDFC LIFE</h3>
              <div class="insuranceall-cover-block2 layout">
                <h5 class="insuranceall-highlights13 layout">VIEW SCHEMES</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="insuranceall-flex3 layout">
          <div class="insuranceall-flex3-item">
            <div
              class="insuranceall-content-box3 layout"
              data-aos="fade-right"
              data-aos-delay="1000"
              data-aos-duration="1000"
            >
              <div
                style="--src:url(../images/c55ecc1dcaba68ffcc732e31e1dde9d1.png)"
                class="insuranceall-image5 layout"
              ></div>
              <h3 class="insuranceall-subtitle14 layout">RELIANCE</h3>
              <div class="insuranceall-cover-block3 layout">
                <h5 class="insuranceall-highlights14 layout">VIEW SCHEMES</h5>
              </div>
            </div>
          </div>
          <div class="insuranceall-content-box3-spacer"></div>
          <div class="insuranceall-content-box3-item">
            <div
              class="insuranceall-content-box4 layout"
              data-aos="fade-right"
              data-aos-delay="1000"
              data-aos-duration="1000"
            >
              <div
                style="--src:url(../images/a6f32d4f0611dbd3a34c77094c2e62c3.png)"
                class="insuranceall-image4 layout"
              ></div>
              <h3 class="insuranceall-subtitle1 layout1">SBI LIFE</h3>
              <div class="insuranceall-cover-block4 layout">
                <h5 class="insuranceall-highlights15 layout">VIEW SCHEMES</h5>
              </div>
            </div>
          </div>
          <div class="insuranceall-content-box4-spacer"></div>
          <div class="insuranceall-content-box4-item">
            <div
              class="insuranceall-content-box5 layout"
              data-aos="fade-right"
              data-aos-delay="1000"
              data-aos-duration="1000"
            >
              <div
                style="--src:url(../images/10f39c1daaa37d6849bcda28943fbcd6.png)"
                class="insuranceall-image3 layout"
              ></div>
              <h3 class="insuranceall-subtitle1 layout2">BAJAJ ALLIANZ</h3>
              <div class="insuranceall-cover-block5 layout">
                <h5 class="insuranceall-highlights16 layout">VIEW SCHEMES</h5>
              </div>
            </div>
          </div>
          <div class="insuranceall-content-box5-spacer"></div>
          <div class="insuranceall-content-box5-item">
            <div
              class="insuranceall-content-box6 layout"
              data-aos="fade-right"
              data-aos-delay="1000"
              data-aos-duration="1000"
            >
              <div
                style="--src:url(../images/b96b3ee7146256262968478ff54be7d0.png)"
                class="insuranceall-image2 layout"
              ></div>
              <h3 class="insuranceall-subtitle1 layout3">MAX LIFE</h3>
              <div class="insuranceall-cover-block6 layout">
                <h5 class="insuranceall-highlights17 layout">VIEW SCHEMES</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="insuranceall-flex4 layout">
          <div
            class="insuranceall-flex5 layout"
            data-aos="fade-down"
            data-aos-delay="1000"
            data-aos-duration="0"
          >
            <h1 class="insuranceall-big-title11 layout">
              What are health insurance plans?
            </h1>
            <h5 class="insuranceall-highlights layout">
              Health insurance or medical insurance is a type of insurance that
              covers the whole or a part of the risk of a person incurring
              medical expenses. As with other types of insurance is risk among
              many individuals. By estimating the overall risk of health risk
              and health system expenses over the risk pool, an insurer can
              develop a routine finance structure, such as a monthly premium or
              payroll tax, to provide the money to pay for the health care
              benefits specified in the insurance agreement.
            </h5>
          </div>
        </div>
        <div class="insuranceall-flex6 layout">
          <div class="insuranceall-group layout2">
            <div class="insuranceall-box10 layout"></div>
            <div class="insuranceall-flex7 layout">
              <h3 class="insuranceall-subtitle2-box layout">
                <pre class="insuranceall-subtitle2">
Contact Us -
</pre
                >
              </h3>
              <div class="insuranceall-flex7-spacer"></div>
              <div class="insuranceall-flex7-item">
                <div
                  style="--src:url(../images/c69d7bd4a4026d8bddff32f6324d22b8.png)"
                  class="insuranceall-image10 layout"
                ></div>
              </div>
              <div class="insuranceall-flex7-spacer1"></div>
              <div class="insuranceall-flex7-item">
                <div
                  style="--src:url(../images/63d176ca874c07301ba173cad0412041.png)"
                  class="insuranceall-image10 layout"
                ></div>
              </div>
              <div class="insuranceall-flex7-spacer2"></div>
              <div class="insuranceall-flex7-item">
                <div
                  style="--src:url(../images/cc2cd95edd573fa0b752f11eb367dfe8.png)"
                  class="insuranceall-image10 layout1"
                ></div>
              </div>
              <div class="insuranceall-flex7-spacer3"></div>
              <div class="insuranceall-flex7-item">
                <div
                  style="--src:url(../images/5eb42f3f6f867cce10177cb12732ecb5.png)"
                  class="insuranceall-image10 layout2"
                ></div>
              </div>
            </div>
          </div>
          <div class="insuranceall-small-paragraph-body-box layout">
            <pre class="insuranceall-small-paragraph-body">
**Discount is offered by the Insurance company as approved by IRDAI for the product under File &amp; Use guidelines
#On the basis of your profile
Lifegood is now registered as a Direct Broker |Registration No. 000, Registration Code No. IRDA/ DB 000/ 00, Valid till 09/06/2024, License category- Direct Broker (Life &amp; General)| Visitors are hereby informed that their information submitted on the website may be shared with insurers.Product information is authentic and solely based on the information received from the insurers.

© Copyright 2022-2025 | Lifegood.com. All Rights Reserved.</pre
            >
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      AOS.init();
    </script>
  </body>
</html>

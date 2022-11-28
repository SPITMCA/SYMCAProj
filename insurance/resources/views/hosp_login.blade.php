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
    <link rel="stylesheet" type="text/css" href="/css/Login.css" />

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
.login-block {
  display: flex;
  flex-direction: column;
  background-color: white; }

.login-block.layout {
  position: relative;
  overflow: hidden;
  min-height: 720px;
  flex-shrink: 0; }

.login-flex {
  display: flex;
  flex-direction: column; }

.login-flex.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 88.13%;
  margin: 36px auto; }
  @media (max-width: 1199px) {
    .login-flex.layout {
      width: 90.82%;
      margin: 31px auto; } }
  @media (max-width: 991px) {
    .login-flex.layout {
      width: 92.95%;
      margin: 26px auto; } }
  @media (max-width: 767px) {
    .login-flex.layout {
      width: 94.62%;
      margin: 22px auto; } }
  @media (max-width: 575px) {
    .login-flex.layout {
      width: 95.91%;
      margin: 20px auto; } }
  @media (max-width: 479px) {
    .login-flex.layout {
      width: 96.9%;
      margin: 17px auto; } }
  @media (max-width: 383px) {
    .login-flex.layout {
      width: 97.66%;
      margin: 16px auto; } }

.login-flex1 {
  display: flex; }
  @media (max-width: 479px) {
    .login-flex1 {
      flex-wrap: wrap;
      row-gap: 16px; } }

.login-flex1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 0px 0px 6px; }
  @media (max-width: 1199px) {
    .login-flex1.layout {
      margin: 0px 0px 0px 5px; } }

.login-flex1-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 31px; }
  @media (max-width: 479px) {
    .login-flex1-item {
      flex: 0 0 100%; } }

.login-group {
  display: flex;
  flex-direction: column;
  background: var(--src) center center/contain no-repeat; }

.login-group.layout {
  position: relative;
  flex-grow: 1;
  min-height: 23px;
  flex-shrink: 0;
  margin: 21px 0px 0px; }
  @media (max-width: 1199px) {
    .login-group.layout {
      margin: 18px 0px 0px; } }
  @media (max-width: 991px) {
    .login-group.layout {
      margin: 16px 0px 0px; } }
  @media (max-width: 767px) {
    .login-group.layout {
      margin: 13px 0px 0px; } }
  @media (max-width: 575px) {
    .login-group.layout {
      margin: 12px 0px 0px; } }
  @media (max-width: 479px) {
    .login-group.layout {
      margin: 11px 0px 0px; } }
  @media (max-width: 383px) {
    .login-group.layout {
      margin: 10px 0px 0px; } }

.login-group1 {
  display: flex;
  flex-direction: column; }

.login-group1.layout {
  position: absolute;
  top: 0px;
  height: 23px;
  width: 32px;
  right: -28px; }

.login-group2 {
  display: flex;
  flex-direction: column; }

.login-group2.layout {
  position: absolute;
  top: -15px;
  height: 36px;
  left: -2px;
  width: 19px; }

.login-image2 {
  background: var(--src) center center/contain no-repeat; }

.login-image2.layout {
  position: absolute;
  top: 0px;
  height: 36px;
  left: -10px;
  width: 19px; }

.login-image2.layout1 {
  position: relative;
  height: 36px;
  width: 19px;
  min-width: 19px; }

.login-image4 {
  background: var(--src) center center/contain no-repeat; }

.login-image4.layout {
  position: relative;
  height: 23px;
  width: 32px;
  min-width: 32px; }

.login-flex1-spacer {
  flex: 0 1 30px; }
  @media (max-width: 479px) {
    .login-flex1-spacer {
      display: none; } }

.login-flex1-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 479px) {
    .login-flex1-item1 {
      flex: 0 0 100%; } }

.login-big-title1 {
  font: 900 30px/1.2 "Bodoni Moda", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px;
  cursor: pointer; }
  @media (max-width: 1199px) {
    .login-big-title1 {
      font-size: 27px;
      text-align: left; } }
  @media (max-width: 991px) {
    .login-big-title1 {
      font-size: 24px; } }
  @media (max-width: 767px) {
    .login-big-title1 {
      font-size: 21px; } }
  @media (max-width: 575px) {
    .login-big-title1 {
      font-size: 20px; } }
  @media (max-width: 479px) {
    .login-big-title1 {
      font-size: 18px; } }
  @media (max-width: 383px) {
    .login-big-title1 {
      font-size: 17px; } }

.login-big-title1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 0px 8px; }
  @media (max-width: 1199px) {
    .login-big-title1.layout {
      margin: 0px 0px 7px; } }
  @media (max-width: 991px) {
    .login-big-title1.layout {
      margin: 0px 0px 6px; } }
  @media (max-width: 767px) {
    .login-big-title1.layout {
      margin: 0px 0px 5px; } }

.login-flex1-spacer1 {
  flex: 0 1 608px; }
  @media (max-width: 479px) {
    .login-flex1-spacer1 {
      display: none; } }

.login-flex1-item2 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 479px) {
    .login-flex1-item2 {
      flex: 0 0 100%; } }

.login-subtitle {
  font: 700 20px/1.2 "Lato", Helvetica, Arial, serif;
  color: #222222;
  letter-spacing: 0px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }
  @media (max-width: 1199px) {
    .login-subtitle {
      font-size: 19px;
      text-align: left; } }
  @media (max-width: 991px) {
    .login-subtitle {
      font-size: 18px; } }
  @media (max-width: 767px) {
    .login-subtitle {
      font-size: 17px; } }
  @media (max-width: 479px) {
    .login-subtitle {
      font-size: 16px; } }

.login-subtitle:hover {
  transform: scale(0.9); }

.login-subtitle.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 13px 0px 7px; }
  @media (max-width: 1199px) {
    .login-subtitle.layout {
      margin: 11px 0px 6px; } }
  @media (max-width: 991px) {
    .login-subtitle.layout {
      margin: 10px 0px 5px; } }
  @media (max-width: 767px) {
    .login-subtitle.layout {
      margin: 8px 0px 5px; } }
  @media (max-width: 575px) {
    .login-subtitle.layout {
      margin: 7px 0px 5px; } }
  @media (max-width: 383px) {
    .login-subtitle.layout {
      margin: 6px 0px 5px; } }

.login-flex1-spacer2 {
  flex: 0 1 54px; }
  @media (max-width: 479px) {
    .login-flex1-spacer2 {
      display: none; } }

.login-flex1-item3 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 479px) {
    .login-flex1-item3 {
      flex: 0 0 100%; } }

.login-flex1-spacer3 {
  flex: 0 1 54px; }
  @media (max-width: 479px) {
    .login-flex1-spacer3 {
      display: none; } }

.login-flex1-item4 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 479px) {
    .login-flex1-item4 {
      flex: 0 0 100%; } }

.login-big-title {
  display: flex;
  justify-content: flex-end;
  font: 700 32px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  text-align: right;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .login-big-title {
      font-size: 29px;
      text-align: right; } }
  @media (max-width: 991px) {
    .login-big-title {
      font-size: 25px; } }
  @media (max-width: 767px) {
    .login-big-title {
      font-size: 23px; } }
  @media (max-width: 575px) {
    .login-big-title {
      font-size: 21px; } }
  @media (max-width: 479px) {
    .login-big-title {
      font-size: 20px; } }
  @media (max-width: 383px) {
    .login-big-title {
      font-size: 19px; } }

.login-big-title.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 21.1%;
  margin: 114px auto 0px; }
  @media (max-width: 1199px) {
    .login-big-title.layout {
      margin: 93px auto 0px; } }
  @media (max-width: 991px) {
    .login-big-title.layout {
      margin: 71px auto 0px; } }
  @media (max-width: 767px) {
    .login-big-title.layout {
      margin: 52px auto 0px; } }
  @media (max-width: 575px) {
    .login-big-title.layout {
      margin: 42px auto 0px; } }
  @media (max-width: 479px) {
    .login-big-title.layout {
      margin: 33px auto 0px; } }
  @media (max-width: 383px) {
    .login-big-title.layout {
      margin: 26px auto 0px; } }

.login-highlights-box {
  display: flex;
  justify-content: center; }
  @media (max-width: 1199px) {
    .login-highlights-box {
      align-items: flex-start;
      justify-content: center; } }
  @media (max-width: 991px) {
    .login-highlights-box {
      align-items: flex-start;
      justify-content: center; } }
  @media (max-width: 767px) {
    .login-highlights-box {
      align-items: flex-start;
      justify-content: center; } }
  @media (max-width: 479px) {
    .login-highlights-box {
      align-items: flex-start;
      justify-content: center; } }

.login-highlights-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 23.23%;
  margin: 11px auto 0px; }
  @media (max-width: 1199px) {
    .login-highlights-box.layout {
      margin: 10px auto 0px; } }
  @media (max-width: 991px) {
    .login-highlights-box.layout {
      margin: 8px auto 0px; } }
  @media (max-width: 767px) {
    .login-highlights-box.layout {
      margin: 7px auto 0px; } }
  @media (max-width: 575px) {
    .login-highlights-box.layout {
      margin: 6px auto 0px; } }
  @media (max-width: 383px) {
    .login-highlights-box.layout {
      margin: 5px auto 0px; } }

.login-highlights {
  overflow: visible;
  margin-top: 0px;
  margin-bottom: 0px;
  margin: 0px;
  font: 16px/1.29 "Lato", Helvetica, Arial, serif;
  color: #777777;
  text-align: center;
  letter-spacing: 0px;
  white-space: pre-wrap; }
  @media (max-width: 1199px) {
    .login-highlights {
      font-size: 15px;
      text-align: center; } }
  @media (max-width: 991px) {
    .login-highlights {
      font-size: 14px; } }
  @media (max-width: 767px) {
    .login-highlights {
      font-size: 13px; } }
  @media (max-width: 479px) {
    .login-highlights {
      font-size: 12px; } }

.login-text-body {
  display: flex;
  justify-content: center;
  font: 14px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  text-align: center;
  letter-spacing: 0px; }
  @media (max-width: 991px) {
    .login-text-body {
      font-size: 13px;
      text-align: center; } }
  @media (max-width: 575px) {
    .login-text-body {
      font-size: 12px; } }

.login-text-body.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 5.94%;
  margin: 27px 62.77% 0px 32.29%; }
  @media (max-width: 1199px) {
    .login-text-body.layout {
      margin: 24px 62.77% 0px 31.29%; } }
  @media (max-width: 991px) {
    .login-text-body.layout {
      margin: 20px 62.77% 0px 31.29%; } }
  @media (max-width: 767px) {
    .login-text-body.layout {
      margin: 17px 62.77% 0px 31.29%; } }
  @media (max-width: 575px) {
    .login-text-body.layout {
      margin: 15px 62.77% 0px 31.29%; } }
  @media (max-width: 479px) {
    .login-text-body.layout {
      margin: 14px 62.77% 0px 31.29%; } }
  @media (max-width: 383px) {
    .login-text-body.layout {
      margin: 13px 62.77% 0px 31.29%; } }

.login-box {
  background-color: white;
  border: 1px solid rgba(0, 0, 0, 0.4);
  border-radius: 6px 6px 6px 6px; }

.login-box.layout {
  position: relative;
  height: 48px;
  width: 35.46%;
  margin: 12px 0px 0px 385px; }

.login-text-body.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 5.59%;
  margin: 20px 63.12% 0px 32.29%; }
  @media (max-width: 1199px) {
    .login-text-body.layout1 {
      margin: 18px 63.12% 0px 31.29%; } }
  @media (max-width: 991px) {
    .login-text-body.layout1 {
      margin: 15px 63.12% 0px 31.29%; } }
  @media (max-width: 767px) {
    .login-text-body.layout1 {
      margin: 13px 63.12% 0px 31.29%; } }
  @media (max-width: 575px) {
    .login-text-body.layout1 {
      margin: 11px 63.12% 0px 31.29%; } }
  @media (max-width: 479px) {
    .login-text-body.layout1 {
      margin: 10px 63.12% 0px 31.29%; } }

.login-text-body1 {
  display: flex;
  justify-content: center;
  font: 14px/1.2 "Lato", Helvetica, Arial, serif;
  color: #6331a3;
  text-align: center;
  letter-spacing: 0px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }
  @media (max-width: 991px) {
    .login-text-body1 {
      font-size: 13px;
      text-align: center; } }
  @media (max-width: 575px) {
    .login-text-body1 {
      font-size: 12px; } }

.login-text-body1:hover {
  transform: scale(0.9); }

.login-text-body1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 9.49%;
  margin: 7px 63px 0px 57.18%; }
  @media (max-width: 1199px) {
    .login-text-body1.layout {
      margin: 6px 53.33% 0px 57.18%; } }
  @media (max-width: 991px) {
    .login-text-body1.layout {
      margin: 5px 33.33% 0px 57.18%; } }

.login-cover-block {
  display: flex;
  flex-direction: column;
  background-color: #6432a4;
  border: 1px solid rgba(0, 0, 0, 0.4);
  border-radius: 6px 6px 6px 6px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; 


  justify-content: center;
  font: 700 18px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  text-align: center;
  letter-spacing: 0.54px;
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 35.46%;
  margin: 20px auto 0px;

  padding-top: 20px;
  padding-right: 5px;
  padding-bottom: 20px;
  padding-left: 185px;

}


.login-cover-block.layout {}

.login-highlights2 {
  display: flex;
  justify-content: center;
  font: 700 18px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  text-align: center;
  letter-spacing: 0.54px; }
  @media (max-width: 1199px) {
    .login-highlights2 {
      font-size: 17px;
      text-align: center; } }
  @media (max-width: 991px) {
    .login-highlights2 {
      font-size: 16px; } }
  @media (max-width: 767px) {
    .login-highlights2 {
      font-size: 15px; } }
  @media (max-width: 479px) {
    .login-highlights2 {
      font-size: 14px; } }

.login-highlights2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 15px 0px 17px; }
  @media (max-width: 1199px) {
    .login-highlights2.layout {
      margin: 13px 0px 15px; } }
  @media (max-width: 991px) {
    .login-highlights2.layout {
      margin: 11px 0px 13px; } }
  @media (max-width: 767px) {
    .login-highlights2.layout {
      margin: 9px 0px 11px; } }
  @media (max-width: 575px) {
    .login-highlights2.layout {
      margin: 9px 0px 10px; } }
  @media (max-width: 479px) {
    .login-highlights2.layout {
      margin: 8px 0px 9px; } }
  @media (max-width: 383px) {
    .login-highlights2.layout {
      margin: 7px 0px 8px; } }

.login-highlights1-box {
  display: flex;
  justify-content: center;
  cursor: pointer; }
  @media (max-width: 1199px) {
    .login-highlights1-box {
      align-items: flex-start;
      justify-content: center; } }
  @media (max-width: 991px) {
    .login-highlights1-box {
      align-items: flex-start;
      justify-content: center; } }
  @media (max-width: 767px) {
    .login-highlights1-box {
      align-items: flex-start;
      justify-content: center; } }
  @media (max-width: 479px) {
    .login-highlights1-box {
      align-items: flex-start;
      justify-content: center; } }

.login-highlights1-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 19.59%;
  margin: 19px auto 59px; }
  @media (max-width: 1199px) {
    .login-highlights1-box.layout {
      margin: 17px auto 50px; } }
  @media (max-width: 991px) {
    .login-highlights1-box.layout {
      margin: 14px auto 41px; } }
  @media (max-width: 767px) {
    .login-highlights1-box.layout {
      margin: 12px auto 33px; } }
  @media (max-width: 575px) {
    .login-highlights1-box.layout {
      margin: 11px auto 29px; } }
  @media (max-width: 479px) {
    .login-highlights1-box.layout {
      margin: 10px auto 26px; } }
  @media (max-width: 383px) {
    .login-highlights1-box.layout {
      margin: 9px auto 23px; } }

.login-highlights1 {
  font: 16px/1.29 "Lato", Helvetica, Arial, serif;
  color: black;
  text-align: center;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .login-highlights1 {
      font-size: 15px;
      text-align: center; } }
  @media (max-width: 991px) {
    .login-highlights1 {
      font-size: 14px; } }
  @media (max-width: 767px) {
    .login-highlights1 {
      font-size: 13px; } }
  @media (max-width: 479px) {
    .login-highlights1 {
      font-size: 12px; } }

.login-highlights1-span0 {
  font: 1em/1.29 "Lato", Helvetica, Arial, serif;
  color: #666666ff;
  letter-spacing: 0px; }

.login-highlights1-span1 {
  font: 600 1em/1.29 "Lato", Helvetica, Arial, serif;
  color: #6331a3ff;
  letter-spacing: 0px; }


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

  @include('sweetalert::alert')
    

    <div class="login login-block layout">
      <div class="login-flex layout">
        <div class="login-flex1 layout">
          <div class="login-flex1-item">
            <div
              style="--src:url(../images/login/43b720099c45aaa45fb1a6c7977e3c3f.png)"
              class="login-group layout"
            >
              <div class="login-group1 layout">
                <div class="login-group2 layout">
                  <div
                    style="--src:url(../images/login/d05e8cf90be385890090b4638e1297af.png)"
                    class="login-image2 layout"
                  ></div>
                  <div
                    style="--src:url(../images/login/42553057cd6b10417b12e75b9722554b.png)"
                    class="login-image2 layout1"
                  ></div>
                </div>
                <div
                  style="--src:url(../images/login/b4f1983a1a2e564a4e29c0a6e0e136cb.png)"
                  class="login-image4 layout"
                ></div>
              </div>
            </div>
          </div>
          <div class="login-flex1-spacer"></div>
          <div class="login-flex1-item1">
            <h1 class="login-big-title1 layout">Lifegood</h1>
          </div>
          <div class="login-flex1-spacer1"></div>
          <div class="login-flex1-item2">
            <h3 class="login-subtitle layout">Home</h3>
          </div>
          <div class="login-flex1-spacer2"></div>
          <div class="login-flex1-item3">
            <h3 class="login-subtitle layout">About Us</h3>
          </div>
          <div class="login-flex1-spacer3"></div>
          <div class="login-flex1-item4">
            <h3 class="login-subtitle layout"><< Back</h3>
          </div>
        </div>
        <h1
          class="login-big-title layout"
          data-aos="fade-right"
          data-aos-delay="1000"
          data-aos-duration="1000"
        >
          Welcome back!
        </h1>
        <h5
          class="login-highlights-box layout"
          data-aos="fade-right"
          data-aos-delay="1000"
          data-aos-duration="1000"
        >
          <pre class="login-highlights">
Login with your credentials provided</pre
          >
        </h5>

        <form action="/hosp_login_data" method="post"  id="form_l" enctype="multipart/form-data">
            @csrf
          
        <div
          class="login-text-body layout"
          data-aos="fade-right"
          data-aos-delay="1000"
          data-aos-duration="1000"
        >
          Username
        </div>

        <input type="text" id="log_uname" autocomplete="off"
        name="log_uname" 
          class="login-box layout"
          data-aos="fade-right"
          data-aos-delay="1000"
          data-aos-duration="1000" > <br>
        
          <div
          class="login-text-body layout1"
          data-aos="fade-right"
          data-aos-delay="1000"
          data-aos-duration="1000"
        >
          Password
        </div>


        <input type="password" id="log_pass" autocomplete="off"
        name="log_pass"
          class="login-box layout"
          data-aos="fade-right"
          data-aos-delay="1000"
          data-aos-duration="1000"
        />
        <div
          class="login-text-body1 layout"
          data-aos="fade-right"
          data-aos-delay="1000"
          data-aos-duration="1000"
        >
          Forgot Password
        </div>
        <input type=submit
        value="Login"
          class="login-cover-block layout"
          data-aos="fade-right"
          data-aos-delay="1000"
          data-aos-duration="1000"
        >
          <h4 class="login-highlights2 layout">Login</h4>
</form>
        <div
          class="login-highlights1-box layout"
          data-aos="fade-right"
          data-aos-delay="400"
          data-aos-duration="400"
          > <b> </b>
          <div class="login-highlights1">
             <span class="login-highlights1-span0">Don’t have an account? </span><br> 
            <span class="login-highlights1-span1">Sign up</span>
          </div>
        </div>
      </div>
    </div>

    
    <div id="cover-spin"></div>

    <script type="text/javascript">
      AOS.init();
    </script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"
          integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  </body>
</html>

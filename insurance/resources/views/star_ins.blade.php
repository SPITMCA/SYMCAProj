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
    <link rel="stylesheet" type="text/css" href="/css/Star_ins.css" />

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
.star-ins-main {
  display: flex;
  flex-direction: column;
  background-color: white; }

.star-ins-main.layout {
  position: relative;
  overflow: hidden; }

.star-ins-section1__section1 {
  display: flex;
  flex-direction: column; }

.star-ins-section1__section1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section1__flex {
  display: flex; }
  @media (max-width: 479px) {
    .star-ins-section1__flex {
      flex-wrap: wrap;
      row-gap: 16px; } }

.star-ins-section1__flex.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 88.13%;
  margin: 26px auto; }
  @media (max-width: 1199px) {
    .star-ins-section1__flex.layout {
      width: 90.82%;
      margin: 23px auto; } }
  @media (max-width: 991px) {
    .star-ins-section1__flex.layout {
      width: 92.95%;
      margin: 19px auto; } }
  @media (max-width: 767px) {
    .star-ins-section1__flex.layout {
      width: 94.62%;
      margin: 16px auto; } }
  @media (max-width: 575px) {
    .star-ins-section1__flex.layout {
      width: 95.91%;
      margin: 15px auto; } }
  @media (max-width: 479px) {
    .star-ins-section1__flex.layout {
      width: 96.9%;
      margin: 13px auto; } }
  @media (max-width: 383px) {
    .star-ins-section1__flex.layout {
      width: 97.66%;
      margin: 12px auto; } }

.star-ins-section1__flex-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 50px; }
  @media (max-width: 479px) {
    .star-ins-section1__flex-item {
      flex: 0 0 100%; } }

.star-ins-section1__group {
  display: flex;
  flex-direction: column; }

.star-ins-section1__group.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 16px 0px 0px 31px; }
  @media (max-width: 1199px) {
    .star-ins-section1__group.layout {
      margin: 14px 0px 0px 27px; } }
  @media (max-width: 991px) {
    .star-ins-section1__group.layout {
      margin: 12px 0px 0px 23px; } }
  @media (max-width: 767px) {
    .star-ins-section1__group.layout {
      margin: 10px 0px 0px 19px; } }
  @media (max-width: 575px) {
    .star-ins-section1__group.layout {
      margin: 9px 0px 0px 18px; } }
  @media (max-width: 479px) {
    .star-ins-section1__group.layout {
      margin: 8px 16px 0px; } }
  @media (max-width: 383px) {
    .star-ins-section1__group.layout {
      margin: 8px 15px 0px; } }

.star-ins-section1__image1 {
  background: var(--src) center center/contain no-repeat; }

.star-ins-section1__image1.layout {
  position: absolute;
  top: 15px;
  height: 23px;
  left: -25px;
  width: 31px; }

.star-ins-section1__image {
  background: var(--src) center center/contain no-repeat; }

.star-ins-section1__image.layout {
  position: relative;
  height: 36px;
  width: 19px;
  min-width: 19px; }

.star-ins-section1__flex-spacer {
  flex: 0 1 17px; }
  @media (max-width: 479px) {
    .star-ins-section1__flex-spacer {
      display: none; } }

.star-ins-section1__flex-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 142px; }
  @media (max-width: 479px) {
    .star-ins-section1__flex-item1 {
      flex: 0 0 100%; } }

.star-ins-section1__group1 {
  display: flex;
  flex-direction: column;
  cursor: pointer; }

.star-ins-section1__group1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 10px 0px 6px; }
  @media (max-width: 1199px) {
    .star-ins-section1__group1.layout {
      margin: 9px 0px 5px; } }
  @media (max-width: 991px) {
    .star-ins-section1__group1.layout {
      margin: 7px 0px 5px; } }
  @media (max-width: 767px) {
    .star-ins-section1__group1.layout {
      margin: 6px 0px 5px; } }
  @media (max-width: 479px) {
    .star-ins-section1__group1.layout {
      margin: 5px 0px; } }

.star-ins-section1__big-title {
  font: 900 30px/1.2 "Bodoni Moda", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .star-ins-section1__big-title {
      font-size: 27px;
      text-align: left; } }
  @media (max-width: 991px) {
    .star-ins-section1__big-title {
      font-size: 24px; } }
  @media (max-width: 767px) {
    .star-ins-section1__big-title {
      font-size: 21px; } }
  @media (max-width: 575px) {
    .star-ins-section1__big-title {
      font-size: 20px; } }
  @media (max-width: 479px) {
    .star-ins-section1__big-title {
      font-size: 18px; } }
  @media (max-width: 383px) {
    .star-ins-section1__big-title {
      font-size: 17px; } }

.star-ins-section1__big-title.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section1__group.layout1 {
  position: absolute;
  height: 23px;
  bottom: -8px;
  left: -34px;
  width: 32px; }

.star-ins-section1__image.layout1 {
  position: absolute;
  top: -15px;
  height: 36px;
  left: -12px;
  width: 19px; }

.star-ins-section1__image2 {
  background: var(--src) center center/contain no-repeat; }

.star-ins-section1__image2.layout {
  position: relative;
  height: 23px;
  width: 32px;
  min-width: 32px; }

.star-ins-section1__flex-spacer1 {
  flex: 0 1 608px; }
  @media (max-width: 479px) {
    .star-ins-section1__flex-spacer1 {
      display: none; } }

.star-ins-section1__flex-item2 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 479px) {
    .star-ins-section1__flex-item2 {
      flex: 0 0 100%; } }

.star-ins-section1__subtitle {
  font: 700 20px/1.2 "Lato", Helvetica, Arial, serif;
  color: #222222;
  letter-spacing: 0px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }
  @media (max-width: 1199px) {
    .star-ins-section1__subtitle {
      font-size: 19px;
      text-align: left; } }
  @media (max-width: 991px) {
    .star-ins-section1__subtitle {
      font-size: 18px; } }
  @media (max-width: 767px) {
    .star-ins-section1__subtitle {
      font-size: 17px; } }
  @media (max-width: 479px) {
    .star-ins-section1__subtitle {
      font-size: 16px; } }

.star-ins-section1__subtitle:hover {
  transform: scale(0.9); }

.star-ins-section1__subtitle.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 23px 0px 5px; }
  @media (max-width: 1199px) {
    .star-ins-section1__subtitle.layout {
      margin: 20px 0px 5px; } }
  @media (max-width: 991px) {
    .star-ins-section1__subtitle.layout {
      margin: 17px 0px 5px; } }
  @media (max-width: 767px) {
    .star-ins-section1__subtitle.layout {
      margin: 14px 0px 5px; } }
  @media (max-width: 575px) {
    .star-ins-section1__subtitle.layout {
      margin: 13px 0px 5px; } }
  @media (max-width: 479px) {
    .star-ins-section1__subtitle.layout {
      margin: 12px 0px 5px; } }
  @media (max-width: 383px) {
    .star-ins-section1__subtitle.layout {
      margin: 11px 0px 5px; } }

.star-ins-section1__flex-spacer2 {
  flex: 0 1 54px; }
  @media (max-width: 479px) {
    .star-ins-section1__flex-spacer2 {
      display: none; } }

.star-ins-section1__flex-item3 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 479px) {
    .star-ins-section1__flex-item3 {
      flex: 0 0 100%; } }

.star-ins-section1__flex-spacer3 {
  flex: 0 1 54px; }
  @media (max-width: 479px) {
    .star-ins-section1__flex-spacer3 {
      display: none; } }

.star-ins-section1__flex-item4 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 0 auto; }
  @media (max-width: 479px) {
    .star-ins-section1__flex-item4 {
      flex: 0 0 100%; } }

.star-ins-section2__section2 {
  display: flex;
  flex-direction: column; }

.star-ins-section2__section2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section2__group {
  display: flex;
  flex-direction: column; }

.star-ins-section2__group.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 92.11%;
  margin: 62px auto 0px; }
  @media (max-width: 1199px) {
    .star-ins-section2__group.layout {
      margin: 53px auto 0px; } }
  @media (max-width: 991px) {
    .star-ins-section2__group.layout {
      margin: 44px auto 0px; } }
  @media (max-width: 767px) {
    .star-ins-section2__group.layout {
      margin: 35px auto 0px; } }
  @media (max-width: 575px) {
    .star-ins-section2__group.layout {
      margin: 31px auto 0px; } }
  @media (max-width: 479px) {
    .star-ins-section2__group.layout {
      margin: 27px auto 0px; } }
  @media (max-width: 383px) {
    .star-ins-section2__group.layout {
      margin: 24px auto 0px; } }

.star-ins-section2__cover-block {
  display: flex;
  flex-direction: column;
  background-color: white;
  width: 100%;
  height: 100%; }

.star-ins-section2__hero-title {
  display: flex;
  align-items: center;
  justify-content: center;
  font: 700 40px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  text-align: center;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .star-ins-section2__hero-title {
      font-size: 36px;
      text-align: center; } }
  @media (max-width: 991px) {
    .star-ins-section2__hero-title {
      font-size: 32px; } }
  @media (max-width: 767px) {
    .star-ins-section2__hero-title {
      font-size: 28px; } }
  @media (max-width: 575px) {
    .star-ins-section2__hero-title {
      font-size: 26px; } }
  @media (max-width: 479px) {
    .star-ins-section2__hero-title {
      font-size: 24px; } }
  @media (max-width: 383px) {
    .star-ins-section2__hero-title {
      font-size: 23px; } }

.star-ins-section2__hero-title.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 30.53%;
  margin: 63.5px auto 44.5px; }
  @media (max-width: 1199px) {
    .star-ins-section2__hero-title.layout {
      margin: 54px auto 38px; } }
  @media (max-width: 991px) {
    .star-ins-section2__hero-title.layout {
      margin: 45px auto 31px; } }
  @media (max-width: 767px) {
    .star-ins-section2__hero-title.layout {
      margin: 36px auto 26px; } }
  @media (max-width: 575px) {
    .star-ins-section2__hero-title.layout {
      margin: 32px auto 23px; } }
  @media (max-width: 479px) {
    .star-ins-section2__hero-title.layout {
      margin: 28px auto 20px; } }
  @media (max-width: 383px) {
    .star-ins-section2__hero-title.layout {
      margin: 25px auto 18px; } }

.star-ins-section2__image10 {
  background: var(--src) center center/contain no-repeat; }

.star-ins-section2__image10.layout {
  position: absolute;
  top: -10px;
  height: 128px;
  left: 54px;
  width: 278px; }

.star-ins-section3__section3 {
  display: flex;
  flex-direction: column; }

.star-ins-section3__section3.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section3__flex1 {
  display: flex;
  flex-direction: column;
  background-color: white; }

.star-ins-section3__flex1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 92.19%;
  margin: 0px auto; }
  @media (max-width: 1399px) {
    .star-ins-section3__flex1.layout {
      width: 94.02%; } }
  @media (max-width: 1199px) {
    .star-ins-section3__flex1.layout {
      width: 95.45%; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex1.layout {
      width: 96.55%; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex1.layout {
      width: 97.39%; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex1.layout {
      width: 98.03%; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex1.layout {
      width: 98.51%; } }
  @media (max-width: 383px) {
    .star-ins-section3__flex1.layout {
      width: 98.88%; } }

.star-ins-section3__cover-block6 {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.247059); }

.star-ins-section3__cover-block6.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 88.73%;
  margin: 37px auto 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block6.layout {
      margin: 32px auto 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__cover-block6.layout {
      margin: 27px auto 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__cover-block6.layout {
      margin: 22px auto 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__cover-block6.layout {
      margin: 20px auto 0px; } }
  @media (max-width: 479px) {
    .star-ins-section3__cover-block6.layout {
      margin: 18px auto 0px; } }
  @media (max-width: 383px) {
    .star-ins-section3__cover-block6.layout {
      margin: 16px auto 0px; } }

.star-ins-section3__flex2 {
  display: flex; }
  @media (max-width: 991px) {
    .star-ins-section3__flex2 {
      flex-wrap: wrap;
      row-gap: 16px; } }

.star-ins-section3__flex2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 14px 12px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex2.layout {
      margin: 12px 11px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex2.layout {
      margin: 10px 9px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex2.layout {
      margin: 9px 8px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex2.layout {
      margin: 8px 7px; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex2.layout {
      margin: 7px 6px; } }

.star-ins-section3__flex2-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 399px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex2-item {
      flex: 0 0 100%; } }

.star-ins-section3__flex3 {
  display: flex;
  flex-direction: column; }

.star-ins-section3__flex3.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 7px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex3.layout {
      margin: 6px 0px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex3.layout {
      margin: 5px 0px 0px; } }

.star-ins-section3__subtitle1 {
  font: 700 20px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__subtitle1 {
      font-size: 19px;
      text-align: left; } }
  @media (max-width: 991px) {
    .star-ins-section3__subtitle1 {
      font-size: 18px; } }
  @media (max-width: 767px) {
    .star-ins-section3__subtitle1 {
      font-size: 17px; } }
  @media (max-width: 479px) {
    .star-ins-section3__subtitle1 {
      font-size: 16px; } }

.star-ins-section3__subtitle1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section3__group {
  display: flex;
  flex-direction: column; }

.star-ins-section3__group.layout3 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 66.92%;
  margin: 9px 32.33% 0px 0.75%; }
  @media (max-width: 1199px) {
    .star-ins-section3__group.layout3 {
      margin: 8px 32.33% 0px 0.75%; } }
  @media (max-width: 991px) {
    .star-ins-section3__group.layout3 {
      margin: 7px 32.33% 0px 0.75%; } }
  @media (max-width: 767px) {
    .star-ins-section3__group.layout3 {
      margin: 6px 32.33% 0px 0.75%; } }
  @media (max-width: 575px) {
    .star-ins-section3__group.layout3 {
      margin: 5px 32.33% 0px 0.75%; } }

.star-ins-section3__cover-group {
  display: flex;
  flex-direction: column; }

.star-ins-section3__cover-group.layout {
  position: absolute;
  top: 0px;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  bottom: 5px;
  left: 0px;
  width: 19px;
  min-width: 19px; }

.star-ins-section3__cover-block25 {
  display: flex;
  flex-direction: column;
  background: var(--src) center center/contain no-repeat; }

.star-ins-section3__cover-block25.layout {
  position: absolute;
  top: 5px;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  bottom: 5px;
  left: 6px;
  right: 7px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block25.layout {
      left: 5px;
      right: 6px; } }
  @media (max-width: 991px) {
    .star-ins-section3__cover-block25.layout {
      right: 5px; } }

.star-ins-section3__icon {
  background: var(--src) center center/contain no-repeat; }

.star-ins-section3__icon.layout {
  position: relative;
  height: 1px;
  width: 1px;
  min-width: 1px;
  margin: 0px 5px 0px 0px; }

.star-ins-section3__icon.layout1 {
  position: relative;
  height: 1px;
  width: 1px;
  min-width: 1px;
  margin: 3px 0px 0px 5px; }
  @media (max-width: 1199px) {
    .star-ins-section3__icon.layout1 {
      margin: 5px 0px 0px 5px; } }

.star-ins-section3__image9 {
  background: var(--src) center center/contain no-repeat; }

.star-ins-section3__image9.layout {
  position: relative;
  height: 15px;
  width: 19px;
  min-width: 19px; }

.star-ins-section3__group.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section3__image6 {
  background: var(--src) center center/contain no-repeat; }

.star-ins-section3__image6.layout {
  position: absolute;
  top: 4px;
  height: 15px;
  left: -3px;
  width: 17px; }

.star-ins-section3__small-text-body1-box {
  display: flex;
  align-items: center;
  width: 100%;
  height: 100%; }

.star-ins-section3__small-text-body1 {
  overflow: visible;
  margin-top: 0px;
  margin-bottom: 0px;
  margin: 0px;
  font: 700 12px/1.2 "Bodoni Moda", Helvetica, Arial, serif;
  color: #0fa958;
  letter-spacing: 0px;
  white-space: pre-wrap; }

.star-ins-section3__small-text-body1-span0 {
  font: 700 1em/1.2 "Bodoni Moda", Helvetica, Arial, serif;
  color: #0fa958ff;
  letter-spacing: 0px; }

.star-ins-section3__small-text-body1-span1 {
  font: 700 1em/1.2 "Lato", Helvetica, Arial, serif;
  color: #0fa958ff;
  letter-spacing: 0px; }

.star-ins-section3__flex4 {
  display: flex; }

.star-ins-section3__flex4.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 19px 2px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex4.layout {
      margin: 17px 5px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex4.layout {
      margin: 14px 5px 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex4.layout {
      margin: 12px 5px 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex4.layout {
      margin: 11px 5px 0px; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex4.layout {
      margin: 10px 5px 0px; } }
  @media (max-width: 383px) {
    .star-ins-section3__flex4.layout {
      margin: 9px 5px 0px; } }

.star-ins-section3__flex4-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 177px; }

.star-ins-section3__cover-block5 {
  display: flex;
  flex-direction: column;
  background-color: #f5f0f0;
  border-radius: 11.7px 11.7px 11.7px 11.7px; }

.star-ins-section3__cover-block5.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section3__small-text-body {
  display: flex;
  align-items: center;
  justify-content: center;
  font: 700 11px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  text-align: center;
  letter-spacing: 0px; }

.star-ins-section3__small-text-body.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 5px 18.5px 5px 19.5px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body.layout {
      margin: 5px 16px 5px 17px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body.layout {
      margin: 5px 14px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body.layout {
      margin: 5px 12px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body.layout {
      margin: 5px 11px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body.layout {
      margin: 5px 10px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body.layout {
      margin: 5px 9px; } }

.star-ins-section3__flex4-spacer {
  flex: 0 1 16px; }

.star-ins-section3__flex4-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 168px; }

.star-ins-section3__cover-block4 {
  display: flex;
  flex-direction: column;
  background-color: #f5f0f0;
  border-radius: 11.7px 11.7px 11.7px 11.7px; }

.star-ins-section3__cover-block4.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section3__small-text-body.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 3.5px 19.5px 6.5px 18.5px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body.layout1 {
      margin: 5px 17px 6px 16px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body.layout1 {
      margin: 5px 14px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body.layout1 {
      margin: 5px 12px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body.layout1 {
      margin: 5px 11px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body.layout1 {
      margin: 5px 10px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body.layout1 {
      margin: 5px 9px; } }

.star-ins-section3__flex5 {
  display: flex; }

.star-ins-section3__flex5.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 17px 0px 0px 3px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex5.layout {
      margin: 15px 0px 0px 5px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex5.layout {
      margin: 13px 0px 0px 5px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex5.layout {
      margin: 11px 0px 0px 5px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex5.layout {
      margin: 10px 0px 0px 5px; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex5.layout {
      margin: 9px 0px 0px 5px; } }
  @media (max-width: 383px) {
    .star-ins-section3__flex5.layout {
      margin: 8px 0px 0px 5px; } }

.star-ins-section3__flex5-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 201px; }

.star-ins-section3__cover-block3 {
  display: flex;
  flex-direction: column;
  background-color: #f5f0f0;
  border-radius: 11.7px 11.7px 11.7px 11.7px; }

.star-ins-section3__cover-block3.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section3__small-text-body.layout2 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 3px 22.5px 6px 17.5px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body.layout2 {
      margin: 5px 20px 5px 15px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body.layout2 {
      margin: 5px 17px 5px 13px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body.layout2 {
      margin: 5px 14px 5px 11px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body.layout2 {
      margin: 5px 13px 5px 10px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body.layout2 {
      margin: 5px 12px 5px 9px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body.layout2 {
      margin: 5px 11px 5px 8px; } }

.star-ins-section3__flex5-spacer {
  flex: 0 1 15px; }

.star-ins-section3__flex5-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 180px; }

.star-ins-section3__cover-block2 {
  display: flex;
  flex-direction: column;
  background-color: #f5f0f0;
  border-radius: 11.7px 11.7px 11.7px 11.7px; }

.star-ins-section3__cover-block2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section3__small-text-body.layout3 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 4.5px 27px 4.5px 17px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body.layout3 {
      margin: 5px 24px 5px 15px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body.layout3 {
      margin: 5px 20px 5px 13px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body.layout3 {
      margin: 5px 17px 5px 11px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body.layout3 {
      margin: 5px 15px 5px 10px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body.layout3 {
      margin: 5px 14px 5px 9px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body.layout3 {
      margin: 5px 13px 5px 8px; } }

.star-ins-section3__flex5-spacer1 {
  flex: 0 1 184px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex5-spacer1 {
      display: none; } }

.star-ins-section3__flex5-item2 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 135px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex5-item2 {
      flex: 0 0 100%; } }

.star-ins-section3__flex6 {
  display: flex;
  flex-direction: column; }

.star-ins-section3__flex6.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 31px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex6.layout {
      margin: 27px 0px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex6.layout {
      margin: 23px 0px 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex6.layout {
      margin: 19px 0px 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex6.layout {
      margin: 18px 0px 0px; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex6.layout {
      margin: 16px 0px 0px; } }
  @media (max-width: 383px) {
    .star-ins-section3__flex6.layout {
      margin: 15px 0px 0px; } }

.star-ins-section3__small-paragraph-body-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section3__small-paragraph-body {
  overflow: visible;
  margin-top: 0px;
  margin-bottom: 0px;
  margin: 0px;
  font: 11px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  letter-spacing: 0px;
  white-space: pre-wrap; }

.star-ins-section3__small-paragraph-body-span0 {
  font: 1em/1.2 "Lato", Helvetica, Arial, serif;
  color: #000000ff;
  letter-spacing: 0px; }

.star-ins-section3__small-paragraph-body-span1 {
  font: 800 1.27273em/1.2 "Lato", Helvetica, Arial, serif;
  color: #000000ff;
  letter-spacing: 0px; }

.star-ins-section3__small-paragraph-body1-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 31px 10px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-paragraph-body1-box.layout {
      margin: 27px 9px 0px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-paragraph-body1-box.layout {
      margin: 23px 7px 0px 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-paragraph-body1-box.layout {
      margin: 19px 6px 0px 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-paragraph-body1-box.layout {
      margin: 18px 6px 0px 0px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-paragraph-body1-box.layout {
      margin: 16px 5px 0px 0px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-paragraph-body1-box.layout {
      margin: 15px 5px 0px 0px; } }

.star-ins-section3__small-paragraph-body1-span0 {
  font: 1em/1.2 "Lato", Helvetica, Arial, serif;
  color: #000000ff;
  letter-spacing: 0px; }

.star-ins-section3__small-paragraph-body1-span1 {
  font: 800 1.27273em/1.2 "Lato", Helvetica, Arial, serif;
  color: #000000ff;
  letter-spacing: 0px; }

.star-ins-section3__flex6-spacer {
  flex: 0 1 73px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex6-spacer {
      display: none; } }

.star-ins-section3__flex6-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 232px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex6-item {
      flex: 0 0 100%; } }

.star-ins-section3__cover-block1 {
  display: flex;
  flex-direction: column;
  background-color: #6432a4;
  border-radius: 4px 4px 4px 4px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }

.star-ins-section3__cover-block1:hover {
  transform: scale(0.9); }

.star-ins-section3__cover-block1.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 97px 17px 5px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block1.layout {
      margin: 80px 15px 5px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__cover-block1.layout {
      margin: 63px 13px 5px; } }
  @media (max-width: 767px) {
    .star-ins-section3__cover-block1.layout {
      margin: 47px 11px 5px; } }
  @media (max-width: 575px) {
    .star-ins-section3__cover-block1.layout {
      margin: 40px 10px 5px; } }
  @media (max-width: 479px) {
    .star-ins-section3__cover-block1.layout {
      margin: 32px 9px 5px; } }
  @media (max-width: 383px) {
    .star-ins-section3__cover-block1.layout {
      margin: 27px 8px 5px; } }

.star-ins-section3__subtitle2 {
  display: flex;
  align-items: center;
  justify-content: center;
  font: 700 20px/1.2 "Lato", Helvetica, Arial, serif;
  color: white;
  text-align: center;
  letter-spacing: 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__subtitle2 {
      font-size: 19px;
      text-align: center; } }
  @media (max-width: 991px) {
    .star-ins-section3__subtitle2 {
      font-size: 18px; } }
  @media (max-width: 767px) {
    .star-ins-section3__subtitle2 {
      font-size: 17px; } }
  @media (max-width: 479px) {
    .star-ins-section3__subtitle2 {
      font-size: 16px; } }

.star-ins-section3__subtitle2.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 55.35%;
  margin: 8.5px auto; }
  @media (max-width: 1199px) {
    .star-ins-section3__subtitle2.layout {
      margin: 7px auto; } }
  @media (max-width: 991px) {
    .star-ins-section3__subtitle2.layout {
      margin: 6px auto; } }
  @media (max-width: 767px) {
    .star-ins-section3__subtitle2.layout {
      margin: 5px auto; } }

.star-ins-section3__cover-block12 {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.247059); }

.star-ins-section3__cover-block12.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 88.73%;
  margin: 39px auto 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block12.layout {
      margin: 34px auto 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__cover-block12.layout {
      margin: 28px auto 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__cover-block12.layout {
      margin: 23px auto 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__cover-block12.layout {
      margin: 21px auto 0px; } }
  @media (max-width: 479px) {
    .star-ins-section3__cover-block12.layout {
      margin: 18px auto 0px; } }
  @media (max-width: 383px) {
    .star-ins-section3__cover-block12.layout {
      margin: 17px auto 0px; } }

.star-ins-section3__flex7 {
  display: flex; }
  @media (max-width: 991px) {
    .star-ins-section3__flex7 {
      flex-wrap: wrap;
      row-gap: 16px; } }

.star-ins-section3__flex7.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 13px 7px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex7.layout {
      margin: 11px 6px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex7.layout {
      margin: 10px 5px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex7.layout {
      margin: 8px 5px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex7.layout {
      margin: 7px 5px; } }
  @media (max-width: 383px) {
    .star-ins-section3__flex7.layout {
      margin: 6px 5px; } }

.star-ins-section3__flex7-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 401px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex7-item {
      flex: 0 0 100%; } }

.star-ins-section3__flex8 {
  display: flex;
  flex-direction: column; }

.star-ins-section3__flex8.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 9px 0px 1px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex8.layout {
      margin: 8px 0px 5px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex8.layout {
      margin: 7px 0px 5px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex8.layout {
      margin: 6px 0px 5px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex8.layout {
      margin: 5px 0px; } }

.star-ins-section3__group.layout4 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 50.12%;
  margin: 0px 49.88% 0px 0%; }

.star-ins-section3__cover-group1 {
  display: flex;
  flex-direction: column; }

.star-ins-section3__cover-group1.layout {
  position: absolute;
  height: 15px;
  bottom: -27px;
  left: 13px;
  width: 16px; }

.star-ins-section3__cover-block25.layout1 {
  position: absolute;
  top: 5px;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  bottom: 5px;
  left: 5px;
  right: 5px; }

.star-ins-section3__icon.layout2 {
  position: relative;
  height: 1px;
  width: 1px;
  min-width: 1px;
  margin: 3px 0px 0px 5px; }
  @media (max-width: 1199px) {
    .star-ins-section3__icon.layout2 {
      margin: 5px 0px 0px 5px; } }

.star-ins-section3__image8 {
  background: var(--src) center center/contain no-repeat; }

.star-ins-section3__image8.layout {
  position: relative;
  height: 15px;
  width: 16px;
  min-width: 16px; }

.star-ins-section3__cover-block25-item {
  display: flex;
  flex-direction: column;
  position: relative; }

.star-ins-section3__group.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 66.58%;
  margin: 10px 31.42% 0px 2%; }
  @media (max-width: 1199px) {
    .star-ins-section3__group.layout1 {
      margin: 9px 31.42% 0px 2%; } }
  @media (max-width: 991px) {
    .star-ins-section3__group.layout1 {
      margin: 7px 31.42% 0px 2%; } }
  @media (max-width: 767px) {
    .star-ins-section3__group.layout1 {
      margin: 6px 31.42% 0px 2%; } }
  @media (max-width: 479px) {
    .star-ins-section3__group.layout1 {
      margin: 5px 31.42% 0px 2%; } }

.star-ins-section3__small-text-body11-box {
  display: flex;
  align-items: center; }

.star-ins-section3__small-text-body11-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section3__small-text-body11-span0 {
  font: 700 1em/1.2 "Bodoni Moda", Helvetica, Arial, serif;
  color: #0fa958ff;
  letter-spacing: 0px; }

.star-ins-section3__small-text-body11-span1 {
  font: 700 1em/1.2 "Lato", Helvetica, Arial, serif;
  color: #0fa958ff;
  letter-spacing: 0px; }

.star-ins-section3__image7 {
  background: var(--src) center center/contain no-repeat;
  width: 100%;
  height: 100%; }

.star-ins-section3__flex9 {
  display: flex; }

.star-ins-section3__flex9.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 16px 7px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex9.layout {
      margin: 14px 6px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex9.layout {
      margin: 12px 5px 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex9.layout {
      margin: 10px 5px 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex9.layout {
      margin: 9px 5px 0px; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex9.layout {
      margin: 8px 5px 0px; } }

.star-ins-section3__flex9-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 177px; }

.star-ins-section3__cover-block11 {
  display: flex;
  flex-direction: column;
  background-color: #f5f0f0;
  border-radius: 11.7px 11.7px 11.7px 11.7px; }

.star-ins-section3__cover-block11.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section3__small-text-body.layout4 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 4.5px 38.5px 4.5px 39.5px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body.layout4 {
      margin: 5px 33px 5px 34px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body.layout4 {
      margin: 5px 28px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body.layout4 {
      margin: 5px 23px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body.layout4 {
      margin: 5px 21px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body.layout4 {
      margin: 5px 18px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body.layout4 {
      margin: 5px 17px; } }

.star-ins-section3__flex9-spacer {
  flex: 0 1 17px; }

.star-ins-section3__flex9-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 168px; }

.star-ins-section3__cover-block10 {
  display: flex;
  flex-direction: column;
  background-color: #f5f0f0;
  border-radius: 11.7px 11.7px 11.7px 11.7px; }

.star-ins-section3__cover-block10.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section3__small-text-body.layout5 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 4.5px 20.5px 4.5px 19.5px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body.layout5 {
      margin: 5px 18px 5px 17px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body.layout5 {
      margin: 5px 15px 5px 14px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body.layout5 {
      margin: 5px 13px 5px 12px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body.layout5 {
      margin: 5px 12px 5px 11px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body.layout5 {
      margin: 5px 11px 5px 10px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body.layout5 {
      margin: 5px 10px 5px 9px; } }

.star-ins-section3__flex10 {
  display: flex; }

.star-ins-section3__flex10.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 18px 0px 0px 9px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex10.layout {
      margin: 16px 0px 0px 8px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex10.layout {
      margin: 13px 0px 0px 7px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex10.layout {
      margin: 11px 0px 0px 6px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex10.layout {
      margin: 10px 0px 0px 5px; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex10.layout {
      margin: 9px 0px 0px 5px; } }

.star-ins-section3__flex10-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 201px; }

.star-ins-section3__cover-block3.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 1px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block3.layout1 {
      margin: 5px 0px 0px; } }

.star-ins-section3__small-text-body.layout6 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 3px 22.5px 6px 17.5px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body.layout6 {
      margin: 5px 20px 5px 15px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body.layout6 {
      margin: 5px 17px 5px 13px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body.layout6 {
      margin: 5px 14px 5px 11px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body.layout6 {
      margin: 5px 13px 5px 10px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body.layout6 {
      margin: 5px 12px 5px 9px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body.layout6 {
      margin: 5px 11px 5px 8px; } }

.star-ins-section3__flex10-spacer {
  flex: 0 1 11px; }

.star-ins-section3__flex10-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 180px; }

.star-ins-section3__cover-block2.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 0px 1px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block2.layout1 {
      margin: 0px 0px 5px; } }

.star-ins-section3__small-text-body.layout7 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 4.5px 23px 4.5px 21px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body.layout7 {
      margin: 5px 20px 5px 18px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body.layout7 {
      margin: 5px 17px 5px 16px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body.layout7 {
      margin: 5px 14px 5px 13px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body.layout7 {
      margin: 5px 13px 5px 12px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body.layout7 {
      margin: 5px 12px 5px 11px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body.layout7 {
      margin: 5px 11px 5px 10px; } }

.star-ins-section3__flex10-spacer1 {
  flex: 0 1 181px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex10-spacer1 {
      display: none; } }

.star-ins-section3__flex10-item2 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 136px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex10-item2 {
      flex: 0 0 100%; } }

.star-ins-section3__flex11 {
  display: flex;
  flex-direction: column; }

.star-ins-section3__flex11.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 43px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex11.layout {
      margin: 37px 0px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex11.layout {
      margin: 30px 0px 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex11.layout {
      margin: 25px 0px 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex11.layout {
      margin: 22px 0px 0px; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex11.layout {
      margin: 19px 0px 0px; } }
  @media (max-width: 383px) {
    .star-ins-section3__flex11.layout {
      margin: 17px 0px 0px; } }

.star-ins-section3__small-paragraph-body1-box.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section3__small-paragraph-body1-box.layout2 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 21px 10px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-paragraph-body1-box.layout2 {
      margin: 18px 9px 0px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-paragraph-body1-box.layout2 {
      margin: 16px 7px 0px 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-paragraph-body1-box.layout2 {
      margin: 13px 6px 0px 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-paragraph-body1-box.layout2 {
      margin: 12px 6px 0px 0px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-paragraph-body1-box.layout2 {
      margin: 11px 5px 0px 0px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-paragraph-body1-box.layout2 {
      margin: 10px 5px 0px 0px; } }

.star-ins-section3__flex11-spacer {
  flex: 0 1 72px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex11-spacer {
      display: none; } }

.star-ins-section3__flex11-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 243px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex11-item {
      flex: 0 0 100%; } }

.star-ins-section3__cover-block7 {
  display: flex;
  flex-direction: column;
  background-color: #6432a4;
  border-radius: 4px 4px 4px 4px;
  cursor: pointer;
  transition-duration: 0.3s;
  transition-property: transform; }

.star-ins-section3__cover-block7:hover {
  transform: scale(0.9); }

.star-ins-section3__cover-block7.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 88px 27px 16px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block7.layout {
      margin: 74px 24px 14px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__cover-block7.layout {
      margin: 58px 20px 12px; } }
  @media (max-width: 767px) {
    .star-ins-section3__cover-block7.layout {
      margin: 45px 17px 10px; } }
  @media (max-width: 575px) {
    .star-ins-section3__cover-block7.layout {
      margin: 38px 15px 9px; } }
  @media (max-width: 479px) {
    .star-ins-section3__cover-block7.layout {
      margin: 32px 14px 8px; } }
  @media (max-width: 383px) {
    .star-ins-section3__cover-block7.layout {
      margin: 27px 13px 8px; } }

.star-ins-section3__subtitle2.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 55.09%;
  margin: 8.5px auto; }
  @media (max-width: 1199px) {
    .star-ins-section3__subtitle2.layout1 {
      margin: 7px auto; } }
  @media (max-width: 991px) {
    .star-ins-section3__subtitle2.layout1 {
      margin: 6px auto; } }
  @media (max-width: 767px) {
    .star-ins-section3__subtitle2.layout1 {
      margin: 5px auto; } }

.star-ins-section3__cover-block18 {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.247059); }

.star-ins-section3__cover-block18.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 88.73%;
  margin: 38px auto 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block18.layout {
      margin: 33px auto 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__cover-block18.layout {
      margin: 27px auto 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__cover-block18.layout {
      margin: 23px auto 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__cover-block18.layout {
      margin: 20px auto 0px; } }
  @media (max-width: 479px) {
    .star-ins-section3__cover-block18.layout {
      margin: 18px auto 0px; } }
  @media (max-width: 383px) {
    .star-ins-section3__cover-block18.layout {
      margin: 16px auto 0px; } }

.star-ins-section3__flex12 {
  display: flex; }
  @media (max-width: 991px) {
    .star-ins-section3__flex12 {
      flex-wrap: wrap;
      row-gap: 16px; } }

.star-ins-section3__flex12.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 14px 17px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex12.layout {
      margin: 12px 15px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex12.layout {
      margin: 10px 13px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex12.layout {
      margin: 9px 11px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex12.layout {
      margin: 8px 10px; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex12.layout {
      margin: 7px 9px; } }
  @media (max-width: 383px) {
    .star-ins-section3__flex12.layout {
      margin: 7px 8px; } }

.star-ins-section3__flex12-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 398px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex12-item {
      flex: 0 0 100%; } }

.star-ins-section3__flex13 {
  display: flex;
  flex-direction: column; }

.star-ins-section3__flex13.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 0px 5px; }

.star-ins-section3__group.layout5 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 47.49%;
  margin: 0px 51.51% 0px 1.01%; }

.star-ins-section3__cover-group2 {
  display: flex;
  flex-direction: column; }

.star-ins-section3__cover-group2.layout {
  position: absolute;
  height: 16px;
  bottom: -32px;
  left: -4px;
  width: 19px; }

.star-ins-section3__cover-block27 {
  display: flex;
  flex-direction: column;
  background: var(--src) center center/contain no-repeat; }

.star-ins-section3__cover-block27.layout {
  position: absolute;
  top: 6px;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  bottom: 5px;
  left: 6px;
  right: 7px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block27.layout {
      top: 5px;
      left: 5px;
      right: 6px; } }
  @media (max-width: 991px) {
    .star-ins-section3__cover-block27.layout {
      right: 5px; } }

.star-ins-section3__flex14 {
  display: flex; }

.star-ins-section3__flex14.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section3__flex14-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 0 auto;
  min-width: 1px; }

.star-ins-section3__line {
  background: var(--src) center center/contain no-repeat; }

.star-ins-section3__line.layout {
  position: relative;
  height: 0px;
  margin: 0px 0px 5px; }

.star-ins-section3__flex14-spacer {
  flex: 0 1 4px; }

.star-ins-section3__icon.layout3 {
  position: relative;
  height: 1px;
  width: 1px;
  min-width: 1px;
  margin: 4px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__icon.layout3 {
      margin: 5px 0px 0px; } }

.star-ins-section3__image5 {
  background: var(--src) center center/contain no-repeat; }

.star-ins-section3__image5.layout {
  position: relative;
  height: 16px;
  width: 19px;
  min-width: 19px; }

.star-ins-section3__group.layout2 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 67.09%;
  margin: 14px 31.16% 0px 1.76%; }
  @media (max-width: 1199px) {
    .star-ins-section3__group.layout2 {
      margin: 12px 31.16% 0px 1.76%; } }
  @media (max-width: 991px) {
    .star-ins-section3__group.layout2 {
      margin: 10px 31.16% 0px 1.76%; } }
  @media (max-width: 767px) {
    .star-ins-section3__group.layout2 {
      margin: 9px 31.16% 0px 1.76%; } }
  @media (max-width: 575px) {
    .star-ins-section3__group.layout2 {
      margin: 8px 31.16% 0px 1.76%; } }
  @media (max-width: 479px) {
    .star-ins-section3__group.layout2 {
      margin: 7px 31.16% 0px 1.76%; } }

.star-ins-section3__cover-block11.layout1 {
  position: absolute;
  height: 23px;
  bottom: -37px;
  left: -8px;
  width: 177px; }

.star-ins-section3__small-text-body.layout8 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 4.5px 38.5px 4.5px 39.5px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body.layout8 {
      margin: 5px 33px 5px 34px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body.layout8 {
      margin: 5px 28px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body.layout8 {
      margin: 5px 23px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body.layout8 {
      margin: 5px 21px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body.layout8 {
      margin: 5px 18px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body.layout8 {
      margin: 5px 17px; } }

.star-ins-section3__flex15 {
  display: flex; }

.star-ins-section3__flex15.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 9px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex15.layout {
      margin: 8px 0px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex15.layout {
      margin: 7px 0px 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex15.layout {
      margin: 6px 0px 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex15.layout {
      margin: 5px 0px 0px; } }

.star-ins-section3__flex15-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 17px; }

.star-ins-section3__image6.layout1 {
  position: relative;
  height: 15px;
  width: 17px;
  min-width: 17px;
  margin: 0px 0px 16px; }
  @media (max-width: 1199px) {
    .star-ins-section3__image6.layout1 {
      margin: 0px 0px 14px; } }
  @media (max-width: 991px) {
    .star-ins-section3__image6.layout1 {
      margin: 0px 0px 12px; } }
  @media (max-width: 767px) {
    .star-ins-section3__image6.layout1 {
      margin: 0px 0px 10px; } }
  @media (max-width: 575px) {
    .star-ins-section3__image6.layout1 {
      margin: 0px 0px 9px; } }
  @media (max-width: 479px) {
    .star-ins-section3__image6.layout1 {
      margin: 0px 0px 8px; } }

.star-ins-section3__flex15-spacer {
  flex: 0 1 187px; }

.star-ins-section3__flex15-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 169px; }

.star-ins-section3__cover-block16 {
  display: flex;
  flex-direction: column;
  background-color: #f5f0f0;
  border-radius: 11.7px 11.7px 11.7px 11.7px; }

.star-ins-section3__cover-block16.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 7px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block16.layout {
      margin: 6px 0px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__cover-block16.layout {
      margin: 5px 0px 0px; } }

.star-ins-section3__small-text-body.layout9 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 4.5px 32px 5.5px 30px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body.layout9 {
      margin: 5px 28px 5px 26px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body.layout9 {
      margin: 5px 24px 5px 22px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body.layout9 {
      margin: 5px 20px 5px 19px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body.layout9 {
      margin: 5px 18px 5px 17px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body.layout9 {
      margin: 5px 16px 5px 15px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body.layout9 {
      margin: 5px 15px 5px 14px; } }

.star-ins-section3__flex16 {
  display: flex; }

.star-ins-section3__flex16.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 16px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex16.layout {
      margin: 14px 0px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex16.layout {
      margin: 12px 0px 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex16.layout {
      margin: 10px 0px 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex16.layout {
      margin: 9px 0px 0px; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex16.layout {
      margin: 8px 0px 0px; } }

.star-ins-section3__flex16-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 201px; }

.star-ins-section3__small-text-body.layout10 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 3px 22.5px 6px 17.5px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body.layout10 {
      margin: 5px 20px 5px 15px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body.layout10 {
      margin: 5px 17px 5px 13px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body.layout10 {
      margin: 5px 14px 5px 11px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body.layout10 {
      margin: 5px 13px 5px 10px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body.layout10 {
      margin: 5px 12px 5px 9px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body.layout10 {
      margin: 5px 11px 5px 8px; } }

.star-ins-section3__flex16-spacer {
  flex: 0 1 17px; }

.star-ins-section3__flex16-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 180px; }

.star-ins-section3__small-text-body.layout11 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 4.5px 27px 4.5px 17px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body.layout11 {
      margin: 5px 24px 5px 15px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body.layout11 {
      margin: 5px 20px 5px 13px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body.layout11 {
      margin: 5px 17px 5px 11px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body.layout11 {
      margin: 5px 15px 5px 10px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body.layout11 {
      margin: 5px 14px 5px 9px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body.layout11 {
      margin: 5px 13px 5px 8px; } }

.star-ins-section3__flex16-spacer1 {
  flex: 0 1 182px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex16-spacer1 {
      display: none; } }

.star-ins-section3__flex16-item2 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 135px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex16-item2 {
      flex: 0 0 100%; } }

.star-ins-section3__flex17 {
  display: flex;
  flex-direction: column; }

.star-ins-section3__flex17.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 33px 0px 3px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex17.layout {
      margin: 29px 0px 5px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex17.layout {
      margin: 24px 0px 5px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex17.layout {
      margin: 20px 0px 5px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex17.layout {
      margin: 18px 0px 5px; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex17.layout {
      margin: 16px 0px 5px; } }
  @media (max-width: 383px) {
    .star-ins-section3__flex17.layout {
      margin: 15px 0px 5px; } }

.star-ins-section3__small-paragraph-body1-box.layout3 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section3__small-paragraph-body1-box.layout4 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 24px 10px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-paragraph-body1-box.layout4 {
      margin: 21px 9px 0px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-paragraph-body1-box.layout4 {
      margin: 18px 7px 0px 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-paragraph-body1-box.layout4 {
      margin: 15px 6px 0px 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-paragraph-body1-box.layout4 {
      margin: 14px 6px 0px 0px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-paragraph-body1-box.layout4 {
      margin: 12px 5px 0px 0px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-paragraph-body1-box.layout4 {
      margin: 11px 5px 0px 0px; } }

.star-ins-section3__flex17-spacer {
  flex: 0 1 73px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex17-spacer {
      display: none; } }

.star-ins-section3__flex17-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 225px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex17-item {
      flex: 0 0 100%; } }

.star-ins-section3__cover-block1.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 83px 10px 18px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block1.layout1 {
      margin: 70px 9px 16px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__cover-block1.layout1 {
      margin: 56px 7px 13px; } }
  @media (max-width: 767px) {
    .star-ins-section3__cover-block1.layout1 {
      margin: 44px 6px 11px; } }
  @media (max-width: 575px) {
    .star-ins-section3__cover-block1.layout1 {
      margin: 38px 6px 10px; } }
  @media (max-width: 479px) {
    .star-ins-section3__cover-block1.layout1 {
      margin: 32px 5px 9px; } }
  @media (max-width: 383px) {
    .star-ins-section3__cover-block1.layout1 {
      margin: 27px 5px 9px; } }

.star-ins-section3__subtitle2.layout2 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 55.35%;
  margin: 9px auto 8px; }
  @media (max-width: 1199px) {
    .star-ins-section3__subtitle2.layout2 {
      margin: 8px auto 7px; } }
  @media (max-width: 991px) {
    .star-ins-section3__subtitle2.layout2 {
      margin: 7px auto 6px; } }
  @media (max-width: 767px) {
    .star-ins-section3__subtitle2.layout2 {
      margin: 6px auto 5px; } }
  @media (max-width: 575px) {
    .star-ins-section3__subtitle2.layout2 {
      margin: 5px auto; } }

.star-ins-section3__cover-block24 {
  display: flex;
  flex-direction: column;
  background-color: white;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.247059); }

.star-ins-section3__cover-block24.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 88.73%;
  margin: 31px auto 60px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block24.layout {
      margin: 27px auto 51px; } }
  @media (max-width: 991px) {
    .star-ins-section3__cover-block24.layout {
      margin: 23px auto 42px; } }
  @media (max-width: 767px) {
    .star-ins-section3__cover-block24.layout {
      margin: 19px auto 34px; } }
  @media (max-width: 575px) {
    .star-ins-section3__cover-block24.layout {
      margin: 18px auto 30px; } }
  @media (max-width: 479px) {
    .star-ins-section3__cover-block24.layout {
      margin: 16px auto 26px; } }
  @media (max-width: 383px) {
    .star-ins-section3__cover-block24.layout {
      margin: 15px auto 23px; } }

.star-ins-section3__flex18 {
  display: flex; }
  @media (max-width: 991px) {
    .star-ins-section3__flex18 {
      flex-wrap: wrap;
      row-gap: 16px; } }

.star-ins-section3__flex18.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 11px 16px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex18.layout {
      margin: 10px 14px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex18.layout {
      margin: 8px 12px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex18.layout {
      margin: 7px 10px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex18.layout {
      margin: 6px 9px; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex18.layout {
      margin: 6px 8px; } }
  @media (max-width: 383px) {
    .star-ins-section3__flex18.layout {
      margin: 5px 8px; } }

.star-ins-section3__flex18-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 399px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex18-item {
      flex: 0 0 100%; } }

.star-ins-section3__flex19 {
  display: flex;
  flex-direction: column; }

.star-ins-section3__flex19.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 14px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex19.layout {
      margin: 12px 0px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex19.layout {
      margin: 10px 0px 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex19.layout {
      margin: 9px 0px 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex19.layout {
      margin: 8px 0px 0px; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex19.layout {
      margin: 7px 0px 0px; } }

.star-ins-section3__subtitle1.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 8px; }
  @media (max-width: 1199px) {
    .star-ins-section3__subtitle1.layout1 {
      margin: 0px 7px; } }
  @media (max-width: 991px) {
    .star-ins-section3__subtitle1.layout1 {
      margin: 0px 6px; } }
  @media (max-width: 767px) {
    .star-ins-section3__subtitle1.layout1 {
      margin: 0px 5px; } }

.star-ins-section3__small-text-body11-box.layout1 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 13px 8px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body11-box.layout1 {
      margin: 11px 7px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body11-box.layout1 {
      margin: 10px 6px 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body11-box.layout1 {
      margin: 8px 5px 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body11-box.layout1 {
      margin: 7px 5px 0px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body11-box.layout1 {
      margin: 6px 5px 0px; } }

.star-ins-section3__flex20 {
  display: flex; }

.star-ins-section3__flex20.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 14px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex20.layout {
      margin: 12px 0px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex20.layout {
      margin: 10px 0px 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex20.layout {
      margin: 9px 0px 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex20.layout {
      margin: 8px 0px 0px; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex20.layout {
      margin: 7px 0px 0px; } }

.star-ins-section3__flex20-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 177px; }

.star-ins-section3__cover-group3 {
  display: flex;
  flex-direction: column;
  background: var(--src) center center/contain no-repeat; }

.star-ins-section3__cover-group3.layout {
  position: absolute;
  top: -32px;
  height: 16px;
  left: 4px;
  width: 19px; }

.star-ins-section3__cover-block25.layout2 {
  position: absolute;
  top: 5px;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  bottom: 6px;
  left: 6px;
  right: 7px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block25.layout2 {
      bottom: 5px;
      left: 5px;
      right: 6px; } }
  @media (max-width: 991px) {
    .star-ins-section3__cover-block25.layout2 {
      right: 5px; } }

.star-ins-section3__icon.layout4 {
  position: relative;
  height: 1px;
  width: 1px;
  min-width: 1px;
  margin: 3px 0px 0px 5px; }
  @media (max-width: 1199px) {
    .star-ins-section3__icon.layout4 {
      margin: 5px 0px 0px 5px; } }

.star-ins-section3__small-text-body.layout12 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 4.5px 38.5px 4.5px 39.5px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body.layout12 {
      margin: 5px 33px 5px 34px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body.layout12 {
      margin: 5px 28px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body.layout12 {
      margin: 5px 23px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body.layout12 {
      margin: 5px 21px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body.layout12 {
      margin: 5px 18px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body.layout12 {
      margin: 5px 17px; } }

.star-ins-section3__cover-block25-spacer {
  flex: 0 1 21px; }

.star-ins-section3__cover-block25-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 168px; }

.star-ins-section3__small-text-body.layout13 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 4.5px 31px 4.5px 30px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body.layout13 {
      margin: 5px 27px 5px 26px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body.layout13 {
      margin: 5px 23px 5px 22px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body.layout13 {
      margin: 5px 19px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body.layout13 {
      margin: 5px 18px 5px 17px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body.layout13 {
      margin: 5px 16px 5px 15px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body.layout13 {
      margin: 5px 15px 5px 14px; } }

.star-ins-section3__flex21 {
  display: flex; }

.star-ins-section3__flex21.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 16px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex21.layout {
      margin: 14px 0px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex21.layout {
      margin: 12px 0px 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex21.layout {
      margin: 10px 0px 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex21.layout {
      margin: 9px 0px 0px; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex21.layout {
      margin: 8px 0px 0px; } }

.star-ins-section3__flex21-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 201px; }

.star-ins-section3__cover-block3.layout2 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 2px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block3.layout2 {
      margin: 5px 0px 0px; } }

.star-ins-section3__small-text-body2-box {
  display: flex;
  align-items: center;
  justify-content: center; }

.star-ins-section3__small-text-body2-box.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 3px 12px 6px 7px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body2-box.layout {
      margin: 5px 11px 5px 6px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body2-box.layout {
      margin: 5px 9px 5px 5px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body2-box.layout {
      margin: 5px 8px 5px 5px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body2-box.layout {
      margin: 5px 7px 5px 5px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body2-box.layout {
      margin: 5px 6px 5px 5px; } }

.star-ins-section3__small-text-body2 {
  overflow: visible;
  margin-top: 0px;
  margin-bottom: 0px;
  margin: 0px;
  font: 700 11px/1.2 "Lato", Helvetica, Arial, serif;
  color: black;
  text-align: center;
  letter-spacing: 0px;
  white-space: pre-wrap; }

.star-ins-section3__small-text-body2-span0 {
  font: 700 1em/1.2 "Lato", Helvetica, Arial, serif;
  color: #000000ff;
  letter-spacing: 0px; }

.star-ins-section3__small-text-body2-span1 {
  font: 700 1em/1.2 "Bodoni Moda", Helvetica, Arial, serif;
  color: #000000ff;
  letter-spacing: 0px; }

.star-ins-section3__flex21-spacer {
  flex: 0 1 18px; }

.star-ins-section3__flex21-item1 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 0 1 180px; }

.star-ins-section3__cover-block2.layout2 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 0px 0px 2px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block2.layout2 {
      margin: 0px 0px 5px; } }

.star-ins-section3__small-text-body.layout14 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 4.5px 27px 4.5px 17px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-text-body.layout14 {
      margin: 5px 24px 5px 15px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-text-body.layout14 {
      margin: 5px 20px 5px 13px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-text-body.layout14 {
      margin: 5px 17px 5px 11px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-text-body.layout14 {
      margin: 5px 15px 5px 10px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-text-body.layout14 {
      margin: 5px 14px 5px 9px; } }
  @media (max-width: 383px) {
    .star-ins-section3__small-text-body.layout14 {
      margin: 5px 13px 5px 8px; } }

.star-ins-section3__flex21-spacer1 {
  flex: 0 1 182px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex21-spacer1 {
      display: none; } }

.star-ins-section3__flex21-item2 {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 135px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex21-item2 {
      flex: 0 0 100%; } }

.star-ins-section3__flex22 {
  display: flex;
  flex-direction: column; }

.star-ins-section3__flex22.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 44px 0px 3px; }
  @media (max-width: 1199px) {
    .star-ins-section3__flex22.layout {
      margin: 38px 0px 5px; } }
  @media (max-width: 991px) {
    .star-ins-section3__flex22.layout {
      margin: 31px 0px 5px; } }
  @media (max-width: 767px) {
    .star-ins-section3__flex22.layout {
      margin: 25px 0px 5px; } }
  @media (max-width: 575px) {
    .star-ins-section3__flex22.layout {
      margin: 22px 0px 5px; } }
  @media (max-width: 479px) {
    .star-ins-section3__flex22.layout {
      margin: 20px 0px 5px; } }
  @media (max-width: 383px) {
    .star-ins-section3__flex22.layout {
      margin: 18px 0px 5px; } }

.star-ins-section3__small-paragraph-body1-box.layout5 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content; }

.star-ins-section3__small-paragraph-body1-box.layout6 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 20px 10px 0px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__small-paragraph-body1-box.layout6 {
      margin: 18px 9px 0px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__small-paragraph-body1-box.layout6 {
      margin: 15px 7px 0px 0px; } }
  @media (max-width: 767px) {
    .star-ins-section3__small-paragraph-body1-box.layout6 {
      margin: 13px 6px 0px 0px; } }
  @media (max-width: 575px) {
    .star-ins-section3__small-paragraph-body1-box.layout6 {
      margin: 11px 6px 0px 0px; } }
  @media (max-width: 479px) {
    .star-ins-section3__small-paragraph-body1-box.layout6 {
      margin: 10px 5px 0px 0px; } }

.star-ins-section3__flex22-spacer {
  flex: 0 1 73px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex22-spacer {
      display: none; } }

.star-ins-section3__flex22-item {
  display: flex;
  flex-direction: column;
  position: relative;
  flex: 1 1 226px; }
  @media (max-width: 991px) {
    .star-ins-section3__flex22-item {
      flex: 0 0 100%; } }

.star-ins-section3__cover-block1.layout2 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 97px 11px 11px 0px; }
  @media (max-width: 1199px) {
    .star-ins-section3__cover-block1.layout2 {
      margin: 80px 10px 10px 0px; } }
  @media (max-width: 991px) {
    .star-ins-section3__cover-block1.layout2 {
      margin: 63px 8px 8px; } }
  @media (max-width: 767px) {
    .star-ins-section3__cover-block1.layout2 {
      margin: 47px 7px 7px; } }
  @media (max-width: 575px) {
    .star-ins-section3__cover-block1.layout2 {
      margin: 40px 6px 6px; } }
  @media (max-width: 479px) {
    .star-ins-section3__cover-block1.layout2 {
      margin: 32px 6px 6px; } }
  @media (max-width: 383px) {
    .star-ins-section3__cover-block1.layout2 {
      margin: 27px 5px 5px; } }

.star-ins-section3__subtitle2.layout3 {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  width: 55.35%;
  margin: 11px auto 6px; }
  @media (max-width: 1199px) {
    .star-ins-section3__subtitle2.layout3 {
      margin: 10px auto 5px; } }
  @media (max-width: 991px) {
    .star-ins-section3__subtitle2.layout3 {
      margin: 8px auto 5px; } }
  @media (max-width: 767px) {
    .star-ins-section3__subtitle2.layout3 {
      margin: 7px auto 5px; } }
  @media (max-width: 575px) {
    .star-ins-section3__subtitle2.layout3 {
      margin: 6px auto 5px; } }
  @media (max-width: 383px) {
    .star-ins-section3__subtitle2.layout3 {
      margin: 5px auto; } }


 /* footer style*/

  .insuranceall-flex6 {
  display: flex;
  flex-direction: column; }

.insuranceall-flex6.layout {
  position: relative;
  height: -webkit-min-content;
  height: -moz-min-content;
  height: min-content;
  margin: 63px 78px 0px 0px; }

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
    <main class="star-ins star-ins-main layout">
      <!-- ======= section1 ======= --> 
      <section class="star-ins-section1__section1 layout">
        <div class="star-ins-section1__flex layout">
          <div class="star-ins-section1__flex-item">
            <div class="star-ins-section1__group layout">
              <div
                style="--src:url(../images/star/43b720099c45aaa45fb1a6c7977e3c3f.png)"
                class="star-ins-section1__image1 layout"
              ></div>
              <div
                style="--src:url(../images/star/42553057cd6b10417b12e75b9722554b.png)"
                class="star-ins-section1__image layout"
              ></div>
            </div>
          </div>
          <div class="star-ins-section1__flex-spacer"></div>
          <div class="star-ins-section1__flex-item1">
            <div class="star-ins-section1__group1 layout">
              <h1 class="star-ins-section1__big-title layout">Lifegood</h1>
              <div class="star-ins-section1__group layout1">
                <div
                  style="--src:url(../images/star/d05e8cf90be385890090b4638e1297af.png)"
                  class="star-ins-section1__image layout1"
                ></div>
                <div
                  style="--src:url(../images/star/b4f1983a1a2e564a4e29c0a6e0e136cb.png)"
                  class="star-ins-section1__image2 layout"
                ></div>
              </div>
            </div>
          </div>
          <div class="star-ins-section1__flex-spacer1"></div>
          <div class="star-ins-section1__flex-item2">
            <h3 class="star-ins-section1__subtitle layout">Home</h3>
          </div>
          <div class="star-ins-section1__flex-spacer2"></div>
          <div class="star-ins-section1__flex-item3">
            <h3 class="star-ins-section1__subtitle layout">About Us</h3>
          </div>
          <div class="star-ins-section1__flex-spacer3"></div>
          <div class="star-ins-section1__flex-item4">
            <a href='/cust_logout'><h3 class="star-ins-section1__subtitle layout">Logout</h3></a>
          </div>
        </div>
      </section>
      <comment content="======= End section1 =======" break="true"></comment
      ><!-- ======= section2 ======= --> 
      <section class="star-ins-section2__section2 layout">
        <div class="star-ins-section2__group layout">
          <px-posize
            track-style='{"flexGrow":1}'
            x="0px 1179fr 0fr"
            y="0px minmax(156px,156fr) 0fr"
            ><div
              class="star-ins-section2__cover-block"
              data-aos="fade-down"
              data-aos-delay="1000"
            >
              <h1
                class="star-ins-section2__hero-title layout"
                data-aos="fade-down"
                data-aos-delay="1000"
              >
                Star Life
              </h1>
            </div></px-posize
          >
          <div
            style="--src:url(../images/star/513fbeadcb98e95e2113edb7170ff43e.png)"
            class="star-ins-section2__image10 layout"
            data-aos="fade-down"
            data-aos-delay="1000"
          ></div>
        </div>
      </section>
      <comment content="======= End section2 =======" break="true"></comment
      ><!-- ======= section3 ======= --> 
      <section class="star-ins-section3__section3 layout">
        <div class="star-ins-section3__flex1 layout">
          <div
            class="star-ins-section3__cover-block6 layout"
            data-aos="fade-right"
            data-aos-delay="1000"
            data-aos-duration="1000"
          >
            <div class="star-ins-section3__flex2 layout">
              <div class="star-ins-section3__flex2-item">
                <div class="star-ins-section3__flex3 layout">
                  <h3 class="star-ins-section3__subtitle1 layout">
                    Medi Classic
                  </h3>
                  <div class="star-ins-section3__group layout3">
                    <div class="star-ins-section3__cover-group layout">
                      <div
                        style="--src:url(../images/star/857259e0385b9f915061e524837f5e60.png)"
                        class="star-ins-section3__cover-block25 layout"
                      >
                        <div
                          style="--src:url(../images/star/368cb4f04cdee48eb18f2c2b79fafcf1.png)"
                          class="star-ins-section3__icon layout"
                        ></div>
                        <div
                          style="--src:url(../images/star/cefcd08d6d02298d5e1bc3f662fcf027.png)"
                          class="star-ins-section3__icon layout1"
                        ></div>
                      </div>
                      <div
                        style="--src:url(../images/star/1e5f42f28d65c27223cb04132b296c5f.png)"
                        class="star-ins-section3__image9 layout"
                      ></div>
                    </div>
                    <div class="star-ins-section3__group layout">
                      <div
                        style="--src:url(../images/star/96239060c79ef2d7e85a74ee3d6dd4f9.png)"
                        class="star-ins-section3__image6 layout"
                      ></div>
                      <px-posize
                        track-style='{"flexGrow":1}'
                        x="0px 267fr 0fr"
                        y="0px minmax(0px, 20fr) 0fr"
                        ><div class="star-ins-section3__small-text-body1-box">
                          <pre
                            class="star-ins-section3__small-text-body1"
                          ><span class="star-ins-section3__small-text-body1-span0">         </span><span class="star-ins-section3__small-text-body1-span1">5% Online discount on checkout*</span></pre>
                        </div></px-posize
                      >
                    </div>
                  </div>
                  <div class="star-ins-section3__flex4 layout">
                    <div class="star-ins-section3__flex4-item">
                      <div class="star-ins-section3__cover-block5 layout">
                        <div class="star-ins-section3__small-text-body layout">
                          Room rent limit is 5000/day
                        </div>
                      </div>
                    </div>
                    <div class="star-ins-section3__flex4-spacer"></div>
                    <div class="star-ins-section3__flex4-item1">
                      <div class="star-ins-section3__cover-block4 layout">
                        <div class="star-ins-section3__small-text-body layout1">
                          Rs25,000 No Claim Bonus
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="star-ins-section3__flex5 layout">
                    <div class="star-ins-section3__flex5-item">
                      <div class="star-ins-section3__cover-block3 layout">
                        <div class="star-ins-section3__small-text-body layout2">
                          Restoration of cover once a year
                        </div>
                      </div>
                    </div>
                    <div class="star-ins-section3__flex5-spacer"></div>
                    <div class="star-ins-section3__flex5-item1">
                      <div class="star-ins-section3__cover-block2 layout">
                        <div class="star-ins-section3__small-text-body layout3">
                          11000+ Network Hospitals
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="star-ins-section3__flex5-spacer1"></div>
              <div class="star-ins-section3__flex5-item2">
                <div class="star-ins-section3__flex6 layout">
                  <div
                    class="star-ins-section3__small-paragraph-body-box layout"
                  >
                    <pre
                      class="star-ins-section3__small-paragraph-body"
                    ><span class="star-ins-section3__small-paragraph-body-span0">COVER AMOUNT
</span><span class="star-ins-section3__small-paragraph-body-span1">RS 5 LAKH</span></pre>
                  </div>
                  <div
                    class="star-ins-section3__small-paragraph-body1-box layout"
                  >
                    <pre
                      class="star-ins-section3__small-paragraph-body"
                    ><span class="star-ins-section3__small-paragraph-body1-span0">PREMIUM
</span><span class="star-ins-section3__small-paragraph-body1-span1">RS7,440/YR</span></pre>
                  </div>
                </div>
              </div>
              <div class="star-ins-section3__flex6-spacer"></div>
              <div class="star-ins-section3__flex6-item">
                <div class="star-ins-section3__cover-block1 layout">
                  <a href="{{route('ins_form',['cover_name' => 'mediclassic'])}}"><h3 class="star-ins-section3__subtitle2 layout">
                    Buy Now
                  </h3></a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="star-ins-section3__cover-block12 layout"
            data-aos="fade-right"
            data-aos-delay="1000"
            data-aos-duration="1000"
          >
            <div class="star-ins-section3__flex7 layout">
              <div class="star-ins-section3__flex7-item">
                <div class="star-ins-section3__flex8 layout">
                  <div class="star-ins-section3__group layout4">
                    <h3 class="star-ins-section3__subtitle1 layout">
                      Young Star Silver Plan
                    </h3>
                    <div class="star-ins-section3__cover-group1 layout">
                      <div
                        style="--src:url(../images/star/a9d9120ebc7a628e38fb9ee06062343e.png)"
                        class="star-ins-section3__cover-block25 layout1"
                      >
                        <div
                          style="--src:url(../images/star/b003284c004a2695fcb77ededa3157e0.png)"
                          class="star-ins-section3__icon layout"
                        ></div>
                        <div
                          style="--src:url(../images/star/900840ee5e609988a442b19304186628.png)"
                          class="star-ins-section3__icon layout2"
                        ></div>
                      </div>
                      <div
                        style="--src:url(../images/star/a114b75a05cd59ed3fce0734cf4d88ff.png)"
                        class="star-ins-section3__image8 layout"
                      ></div>
                    </div>
                  </div>
                  <div class="star-ins-section3__cover-block25-item">
                    <div class="star-ins-section3__group layout1">
                      <div
                        class="star-ins-section3__small-text-body11-box layout"
                      >
                        <pre
                          class="star-ins-section3__small-text-body1"
                        ><span class="star-ins-section3__small-text-body11-span0">         </span><span class="star-ins-section3__small-text-body11-span1">5% Online discount on checkout*</span></pre>
                      </div>
                      <px-posize
                        x="2fr 20px 245fr"
                        y="3px 17px 0px"
                        absolute="true"
                        lg-x="2fr 20px 245fr"
                        lg-y="5px 17px 0px"
                        ><div
                          class="star-ins-section3__image7"
                          style="--src:url(../images/star/119ba8a0e1c91ac2a68a4f235a719962.png)"
                        ></div
                      ></px-posize>
                    </div>
                  </div>
                  <div class="star-ins-section3__flex9 layout">
                    <div class="star-ins-section3__flex9-item">
                      <div class="star-ins-section3__cover-block11 layout">
                        <div class="star-ins-section3__small-text-body layout4">
                          Single pvt AC Room
                        </div>
                      </div>
                    </div>
                    <div class="star-ins-section3__flex9-spacer"></div>
                    <div class="star-ins-section3__flex9-item1">
                      <div class="star-ins-section3__cover-block10 layout">
                        <div class="star-ins-section3__small-text-body layout5">
                          Rs1 Lakh No Claim Bonus
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="star-ins-section3__flex10 layout">
                    <div class="star-ins-section3__flex10-item">
                      <div class="star-ins-section3__cover-block3 layout1">
                        <div class="star-ins-section3__small-text-body layout6">
                          Restoration of cover once a year
                        </div>
                      </div>
                    </div>
                    <div class="star-ins-section3__flex10-spacer"></div>
                    <div class="star-ins-section3__flex10-item1">
                      <div class="star-ins-section3__cover-block2 layout1">
                        <div class="star-ins-section3__small-text-body layout7">
                          11000+ Network Hospitals
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="star-ins-section3__flex10-spacer1"></div>
              <div class="star-ins-section3__flex10-item2">
                <div class="star-ins-section3__flex11 layout">
                  <div
                    class="star-ins-section3__small-paragraph-body1-box layout1"
                  >
                    <pre
                      class="star-ins-section3__small-paragraph-body"
                    ><span class="star-ins-section3__small-paragraph-body1-span0">COVER AMOUNT
</span><span class="star-ins-section3__small-paragraph-body1-span1">RS 5 LAKH</span></pre>
                  </div>
                  <div
                    class="star-ins-section3__small-paragraph-body1-box layout2"
                  >
                    <pre
                      class="star-ins-section3__small-paragraph-body"
                    ><span class="star-ins-section3__small-paragraph-body1-span0">PREMIUM
</span><span class="star-ins-section3__small-paragraph-body1-span1">RS5,376/YR</span></pre>
                  </div>
                </div>
              </div>
              <div class="star-ins-section3__flex11-spacer"></div>
              <div class="star-ins-section3__flex11-item">
                <div class="star-ins-section3__cover-block7 layout">
                  <h3 class="star-ins-section3__subtitle2 layout1">
                    Buy Now
                  </h3>
                </div>
              </div>
            </div>
          </div>
          <div
            class="star-ins-section3__cover-block18 layout"
            data-aos="fade-right"
            data-aos-delay="1000"
            data-aos-duration="1000"
          >
            <div class="star-ins-section3__flex12 layout">
              <div class="star-ins-section3__flex12-item">
                <div class="star-ins-section3__flex13 layout">
                  <div class="star-ins-section3__group layout5">
                    <h3 class="star-ins-section3__subtitle1 layout">
                      Diabetes Safe Plan B
                    </h3>
                    <div class="star-ins-section3__cover-group2 layout">
                      <div
                        style="--src:url(../images/star/857259e0385b9f915061e524837f5e60.png)"
                        class="star-ins-section3__cover-block27 layout"
                      >
                        <div class="star-ins-section3__flex14 layout">
                          <div class="star-ins-section3__flex14-item">
                            <div
                              style="--src:url(../images/star/368cb4f04cdee48eb18f2c2b79fafcf1.png)"
                              class="star-ins-section3__line layout"
                            ></div>
                          </div>
                          <div class="star-ins-section3__flex14-spacer"></div>
                          <div class="star-ins-section3__flex14-item">
                            <div
                              style="--src:url(../images/star/cefcd08d6d02298d5e1bc3f662fcf027.png)"
                              class="star-ins-section3__icon layout3"
                            ></div>
                          </div>
                        </div>
                      </div>
                      <div
                        style="--src:url(../images/star/122783a9dda51c42ece0c4e890a1afd5.png)"
                        class="star-ins-section3__image5 layout"
                      ></div>
                    </div>
                  </div>
                  <div class="star-ins-section3__group layout2">
                    <div class="star-ins-section3__cover-block11 layout1">
                      <div class="star-ins-section3__small-text-body layout8">
                        Single pvt AC Room
                      </div>
                    </div>
                    <div
                      class="star-ins-section3__small-text-body11-box layout"
                    >
                      <pre
                        class="star-ins-section3__small-text-body1"
                      ><span class="star-ins-section3__small-text-body11-span0">     </span><span class="star-ins-section3__small-text-body11-span1"> 5% Online discount on checkout*</span></pre>
                    </div>
                  </div>
                  <div class="star-ins-section3__flex15 layout">
                    <div class="star-ins-section3__flex15-item">
                      <div
                        style="--src:url(../images/star/20df3c0aa5300c224bcbd006ba212b7c.png)"
                        class="star-ins-section3__image6 layout1"
                      ></div>
                    </div>
                    <div class="star-ins-section3__flex15-spacer"></div>
                    <div class="star-ins-section3__flex15-item1">
                      <div class="star-ins-section3__cover-block16 layout">
                        <div class="star-ins-section3__small-text-body layout9">
                          Zero No Claim Bonus
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="star-ins-section3__flex16 layout">
                    <div class="star-ins-section3__flex16-item">
                      <div class="star-ins-section3__cover-block3 layout">
                        <div
                          class="star-ins-section3__small-text-body layout10"
                        >
                          Restoration of cover once a year
                        </div>
                      </div>
                    </div>
                    <div class="star-ins-section3__flex16-spacer"></div>
                    <div class="star-ins-section3__flex16-item1">
                      <div class="star-ins-section3__cover-block2 layout">
                        <div
                          class="star-ins-section3__small-text-body layout11"
                        >
                          11000+ Network Hospitals
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="star-ins-section3__flex16-spacer1"></div>
              <div class="star-ins-section3__flex16-item2">
                <div class="star-ins-section3__flex17 layout">
                  <div
                    class="star-ins-section3__small-paragraph-body1-box layout3"
                  >
                    <pre
                      class="star-ins-section3__small-paragraph-body"
                    ><span class="star-ins-section3__small-paragraph-body1-span0">COVER AMOUNT
</span><span class="star-ins-section3__small-paragraph-body1-span1">RS 5 LAKH</span></pre>
                  </div>
                  <div
                    class="star-ins-section3__small-paragraph-body1-box layout4"
                  >
                    <pre
                      class="star-ins-section3__small-paragraph-body"
                    ><span class="star-ins-section3__small-paragraph-body1-span0">PREMIUM
</span><span class="star-ins-section3__small-paragraph-body1-span1">RS14,712/YR</span></pre>
                  </div>
                </div>
              </div>
              <div class="star-ins-section3__flex17-spacer"></div>
              <div class="star-ins-section3__flex17-item">
                <div class="star-ins-section3__cover-block1 layout1">
                  <h3 class="star-ins-section3__subtitle2 layout2">
                    Buy Now
                  </h3>
                </div>
              </div>
            </div>
          </div>
          <div
            class="star-ins-section3__cover-block24 layout"
            data-aos="fade-right"
            data-aos-delay="1000"
            data-aos-duration="1000"
          >
            <div class="star-ins-section3__flex18 layout">
              <div class="star-ins-section3__flex18-item">
                <div class="star-ins-section3__flex19 layout">
                  <h3 class="star-ins-section3__subtitle1 layout1">
                    Cancer Care
                  </h3>
                  <div class="star-ins-section3__small-text-body11-box layout1">
                    <pre
                      class="star-ins-section3__small-text-body1"
                    ><span class="star-ins-section3__small-text-body11-span0">       </span><span class="star-ins-section3__small-text-body11-span1"> 5% Online discount on checkout*</span></pre>
                  </div>
                  <div class="star-ins-section3__flex20 layout">
                    <div class="star-ins-section3__flex20-item">
                      <div class="star-ins-section3__group layout">
                        <div
                          style="--src:url(../images/star/e0c34816b61731c4b01e86a850a71f35.png)"
                          class="star-ins-section3__cover-group3 layout"
                        >
                          <div
                            style="--src:url(../images/star/857259e0385b9f915061e524837f5e60.png)"
                            class="star-ins-section3__cover-block25 layout2"
                          >
                            <div
                              style="--src:url(../images/star/368cb4f04cdee48eb18f2c2b79fafcf1.png)"
                              class="star-ins-section3__icon layout"
                            ></div>
                            <div
                              style="--src:url(../images/star/cefcd08d6d02298d5e1bc3f662fcf027.png)"
                              class="star-ins-section3__icon layout4"
                            ></div>
                          </div>
                          <div
                            style="--src:url(../images/star/122783a9dda51c42ece0c4e890a1afd5.png)"
                            class="star-ins-section3__image5 layout"
                          ></div>
                        </div>
                        <div class="star-ins-section3__cover-block11 layout">
                          <div
                            class="star-ins-section3__small-text-body layout12"
                          >
                            Single pvt AC Room
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="star-ins-section3__cover-block25-spacer"></div>
                    <div class="star-ins-section3__cover-block25-item1">
                      <div class="star-ins-section3__cover-block10 layout">
                        <div
                          class="star-ins-section3__small-text-body layout13"
                        >
                          Zero No Claim Bonus
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="star-ins-section3__flex21 layout">
                    <div class="star-ins-section3__flex21-item">
                      <div class="star-ins-section3__cover-block3 layout2">
                        <div
                          class="star-ins-section3__small-text-body2-box layout"
                        >
                          <pre
                            class="star-ins-section3__small-text-body2"
                          ><span class="star-ins-section3__small-text-body2-span0">No restoration of cover</span><span class="star-ins-section3__small-text-body2-span1"> </span></pre>
                        </div>
                      </div>
                    </div>
                    <div class="star-ins-section3__flex21-spacer"></div>
                    <div class="star-ins-section3__flex21-item1">
                      <div class="star-ins-section3__cover-block2 layout2">
                        <div
                          class="star-ins-section3__small-text-body layout14"
                        >
                          11000+ Network Hospitals
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="star-ins-section3__flex21-spacer1"></div>
              <div class="star-ins-section3__flex21-item2">
                <div class="star-ins-section3__flex22 layout">
                  <div
                    class="star-ins-section3__small-paragraph-body1-box layout5"
                  >
                    <pre
                      class="star-ins-section3__small-paragraph-body"
                    ><span class="star-ins-section3__small-paragraph-body1-span0">COVER AMOUNT
</span><span class="star-ins-section3__small-paragraph-body1-span1">RS 5 LAKH</span></pre>
                  </div>
                  <div
                    class="star-ins-section3__small-paragraph-body1-box layout6"
                  >
                    <pre
                      class="star-ins-section3__small-paragraph-body"
                    ><span class="star-ins-section3__small-paragraph-body1-span0">PREMIUM
</span><span class="star-ins-section3__small-paragraph-body1-span1">RS32,220/YR</span></pre>
                  </div>
                </div>
              </div>
              <div class="star-ins-section3__flex22-spacer"></div>
              <div class="star-ins-section3__flex22-item">
                <div class="star-ins-section3__cover-block1 layout2">
                  <h3 class="star-ins-section3__subtitle2 layout3">
                    Buy Now
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <comment content="======= End section3 =======" break="true"></comment>


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


    </main>
    <script type="text/javascript">
      AOS.init();
    </script>
  </body>
</html>

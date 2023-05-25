<%@ Page Language="C#" AutoEventWireup="true" MasterPageFile="~/Site.Master" CodeBehind="Profile.aspx.cs" Inherits="TaskTracker.Profile" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
    
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }
        body {
          
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            font-family: sans-serif;
        }
        body::before {
            content: "";
            position: absolute;
            top: -50%;
            left: 0;
            background-size: contain;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
        }
        body::after {
            content: "";
            position: absolute;
            bottom: -65%;
            right: -52%;
            background-size: contain;
            background-repeat: no-repeat;
            width: 100%;
            height: 120%;
        }
       /* .container {
            width: 310px;
            height: 400px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border-radius: 10px;
            z-index: 2;
            overflow: hidden;
        }*/
        .card {
               width: 310px;
            height: 400px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border-radius: 10px;
            z-index: 2;
            overflow: hidden;
           
            display: flex;
            flex-direction: column;
        }
        .card .card-header {
            background: url(https://rvs-profile-card-component-main.netlify.app/images/bg-pattern-card.svg);
            background-size: cover;
            background-repeat: no-repeat;
            height: 40%;
        }
        .card .card-body {
            height: 40%;
            position: relative;
            width: 100%;
            border-bottom: 1px solid #80808042;
        }
        .card .card-body::before {
            content: "";
            position: absolute;
            top: -40px;
            left: 50%;
            background: white;
            transform: translate(-50%, 0);
            background-size: cover;
            background-repeat: no-repeat;
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }
        .card .card-body::after {
            content: "";
            position: absolute;
            top: -35px;
            left: 50%;
            background: url(https://rvs-profile-card-component-main.netlify.app/images/image-victor.jpg) white;
            transform: translate(-50%, 0);
            background-size: cover;
            background-repeat: no-repeat;
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }
        .card .card-body .inner {
            position: absolute;
            top: 33%;
            left: 50%;
            transform: translate(-50%, 0);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .card .card-footer {
            height: 20%;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            background-color: #e7b3b3;
        }
        .card .card-footer .inner {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .card .card-footer .inner div:first-child {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: -2px;
        }
        .card .card-footer .inner div:last-child {
            font-size: 14px;
            letter-spacing: 1px;
            color:black;
        }

        .color__gray {
            color: gray;
        }

        @media only screen and (max-width: 568px) {
            body::before {
                top: -25%;
                left: -60%;
                width: 120%;
            }
            body::after {
                bottom: -85%;
                right: -60%;
                width: 120%;
            }
        }
    </style>
</head>
<body>
    
   
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="inner">
                    <div style="font-size: 18px;letter-spacing: .5px;margin-bottom: 10px;"><b style="font-size:27px;">Vamsi Reddy</b></div>
                    <div style="font-size: 13px;letter-spacing: .5px;">
                    <span class="label label-primary">vamsigone001@gmail.com</span>
                  </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="inner">
                    <div>80K</div>
                    <div class="color__gray">Events</div>
                </div>
                <div class="inner">
                    <div>803K</div>
                    <div class="color__gray"> &nbsp;Tasks <br />Created</div>
                </div>
                <div class="inner">
                    <div>1.4K</div>
                    <div class="color__gray"> &nbsp;&nbsp;&nbsp;Tasks <br /> Completed</div>
                </div>
            </div>
        </div>
 
</body>
</html>


</asp:Content>

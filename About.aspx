<%@ Page Title="About" Language="C#" MasterPageFile="~/Site.Master"  AutoEventWireup="true" CodeBehind="About.aspx.cs" Inherits="TaskTracker.About" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">

   <div class="row">
    <div class="col-md-8">
        <h1 class="labelhead">About</h1>
        <div class="jumbotron" style="border:2px solid blue; border-radius:60px;">
            <p style="color:white; font-size:large; margin-top:10px;">TaskTracker is a powerful task tracking tool that helps you stay organized and on top of your to-do list. With TaskTrack, you can easily register your tasks and set reminders for important deadlines, so you never miss a deadline again.</p>
        </div>
        <h3 class="labelhead">TaskTracker allows you to:</h3>
        <div class="jumbotron" style="border:2px solid blue; border-radius:60px;">
            <ul>
                <li style="color:white; font-size:large">Register all your tasks and keep them organized in one place</li>
                <li style="color:white; font-size:large">Set reminders for upcoming tasks and deadlines</li>
                <li style="color:white; font-size:large">Track the progress of each task</li>
                <li style="color:white; font-size:large">Organisation Lead can track their employees daily performance</li>
            </ul>
            <p style="color:white; font-size:large">TaskTracker is designed with simplicity and ease-of-use in mind, so you can focus on your work without any distractions. Sign up for TaskTrack today and start taking control of your tasks and projects!</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="animate__animated animate__bounceInLeft" id="Welcome">
            Welcome To<br>
            Task Tracker!
        </div>
    </div>
</div>



</asp:Content>
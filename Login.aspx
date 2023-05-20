<%@ Page Title="Login" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Login.aspx.cs" Inherits="TaskTracker.Login" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">

    <main>
        <div class="container" >
            <div class="row">
                <div class="col-md-7" style="border: none; top:82px;">
                    <div class="animate__animated animate__bounceInLeft" id="Welcome">
                        Welcome To<br />
                        Task Tracker !
                    </div>
                    <br />
                    <br />
                    <br />
                    <br />
                    <h4 style="color: white">TaskTracker works by allowing users to create, assign, and track tasks, and deadlines
                        in one central location, all while providing powerful security to your info.</h4>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4" id="LogDiv" style="top:100px;">
                
                        <h2 class="labelhead">Sign In</h2>
                        <br />
                        <asp:Panel ID="Panel1" runat="server" DefaultButton="Login_Button">

                            <div class="form-group">
                                <asp:Label ID="lblEmail" class="label" runat="server" AssociatedControlID="txtEmail">Email:</asp:Label>
                                <asp:TextBox ID="txtEmail" runat="server" CssClass="form-control" type="email" ></asp:TextBox>
                            </div>
                            <div class="form-group">
                                <asp:Label ID="lblPassword" class="label" runat="server" AssociatedControlID="txtPassword">Password:</asp:Label><br />
                                <asp:TextBox ID="txtPassword" runat="server" CssClass="form-control" TextMode="Password" Style="display: inline-block;"></asp:TextBox>&nbsp;&nbsp;
                                <span style="color: white"><i class="bi bi-info-circle" data-bs-toggle="modal" data-bs-target="#Policy" title="click"></i></span>
                            </div>
                            <br />
                            <div class="form-group">
                                <asp:Button ID="Login_Button" class="button" runat="server" Text="Login" OnClick="Login_Button_Click" OnClientClick="return Match();" />
                            <br /><br /><br />
                            <p style="color:whitesmoke">Didn't Registered ? <a href="Register.aspx" style="color:greenyellow; text-decoration:none">Sign Up</a></p>  
                                <br /><br /><br />
                            </div>
                        </asp:Panel>
           
                    </div>
             
            </div>
        </div>

    </main>

</asp:Content>
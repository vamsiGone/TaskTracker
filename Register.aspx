<%@ Page Title="Register" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Register.aspx.cs" Inherits="TaskTracker.Register" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">

    <main>

        <div class="row" >

            <div class="col-md-4" style="top:28px;" id="RegDiv">
                <div>
                    <h2 class="labelhead">Fill me Up</h2>
                    <br />
                    <asp:Panel ID="Panel1" runat="server" DefaultButton="Register_Button">
                        <div class="form-group">
                            <asp:Label ID="lblUsername" class="label" runat="server" AssociatedControlID="txtUsername">Username:</asp:Label>
                            <asp:TextBox ID="txtUsername" runat="server" CssClass="form-control"></asp:TextBox>
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" ErrorMessage="Name should not be empty" ControlToValidate="txtUsername" ForeColor="#66FF33" Display="Dynamic"></asp:RequiredFieldValidator>
                        </div>
                        <div class="form-group">
                            <asp:Label ID="lblEmail" class="label" runat="server" AssociatedControlID="txtEmail">Email:</asp:Label>
                            <asp:TextBox ID="txtEmail" runat="server" CssClass="form-control" type="email"></asp:TextBox>
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" ErrorMessage="Email should not be empty" ForeColor="#66FF33" ControlToValidate="txtEmail" Display="Dynamic"></asp:RequiredFieldValidator>
                        </div>
                        <div class="form-group">
                            <asp:Label ID="lblPassword" class="label" runat="server" AssociatedControlID="txtPassword">Password:</asp:Label><br />
                            <asp:TextBox ID="txtPassword" runat="server" CssClass="form-control" TextMode="Password" Style="display: inline-block;"></asp:TextBox>
                            &nbsp;&nbsp;<span style="color: white"><i class="bi bi-info-circle" data-toggle="modal" data-target="#Policy" title="click"></i></span><br />

                            <asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" ErrorMessage="Password should not be empty" ForeColor="#66FF33" Display="Dynamic" ControlToValidate="txtPassword"></asp:RequiredFieldValidator><br />
                            <asp:RegularExpressionValidator ID="RegularExpressionValidator1" runat="server" ErrorMessage="Check the Password Policy, and Enter Again"
                            Display="Dynamic" ControlToValidate="txtPassword" ValidationExpression="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z])(?=.*[@$!%*#?&])(?=.*[0-9]).*$" ValidateRequestMode="Disabled" ForeColor="#66FF33"></asp:RegularExpressionValidator>
                        </div>
                        <div class="form-group">
                            <asp:Label ID="lblConfirmPassword" class="label" runat="server" AssociatedControlID="txtConfirmPassword">Confirm Password:</asp:Label>
                            <asp:TextBox ID="txtConfirmPassword" runat="server" CssClass="form-control" TextMode="Password"></asp:TextBox>
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" ErrorMessage="Confirm Password should not be empty" ControlToValidate="txtConfirmPassword" Display="Dynamic" ForeColor="#66FF33"></asp:RequiredFieldValidator><br />
                            <asp:CompareValidator ID="CompareValidator1" runat="server" ErrorMessage="Password and Confirm Password should be same" ControlToValidate="txtPassword" ControlToCompare="txtConfirmPassword" Display="Dynamic" ForeColor="#66FF33"></asp:CompareValidator>
                        </div>
                        <br />
                        <div class="form-group">           
                            <asp:Button ID="Register_Button" class="button" runat="server" Text="Register" OnClick="Register_Button_Click" /><br /><br /><br />
                            <p style="color:whitesmoke">Already Registered ? <a href="login.aspx" style="color:greenyellow; text-decoration:none">Sign in</a></p>                          
                        </div>
                    </asp:Panel>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-7" style="top:50px; float:right">
                <div class="animate__animated animate__bounceInLeft" id="Welcome">Welcome To Task Tracker !</div>
                <br />
                <br />
                <h3 style="color:chartreuse">To get started,</h3>
                <h4 style="color: white">we just need a few details to create your account. </h4>
                <br />
                <br />
            </div>
        </div>
    </main>

</asp:Content>

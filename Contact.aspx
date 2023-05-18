<%@ Page Title="Contact" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Contact.aspx.cs" Inherits="TaskTracker.Contact" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">

    <div class="row">
        <div class="col-md-7" style="top: 50px;">
            <br />
            <div class="jumbotron" style="border-radius: 60px;">
                <p class="text-primary">We appreciate your feedback and value your opinion.</p>
                <p style="color: white;">
                    Your feedback helps us to improve our products and services and provide you with a better experience in the future.
                      <br />
                    If you have any suggestions, concerns or comments about our products or services, please feel free to share them with us.
                      <br />
                    Your feedback will be taken into consideration and we will do our best to address any issues you may have. 
                      <br />
                    <br />
                    Thank you for taking the time to provide us with your valuable feedback.
                </p>
                <p class="labelhead"><b>Contact Us at:</b> info@tasktracker.com</p>
            </div>

        </div>
        <div class="col-md-1"></div>

        <div class="col-md-4" id="ContactDiv" style="top:84px;" >
         
                <h2 class="labelhead">FeedBack</h2>
                <br />
                <asp:Panel ID="Panel1" runat="server" DefaultButton="Submit_Button">
                    <div class="form-group">
                        <asp:Label ID="lblname" class="label" runat="server" AssociatedControlID="txtName">Name:</asp:Label>
                        <asp:TextBox ID="txtName" runat="server" CssClass="form-control"></asp:TextBox>
                    </div>
                    <div class="form-group">
                        <asp:Label ID="lblEmail" class="label" runat="server" AssociatedControlID="txtEmail">Email:</asp:Label>
                        <asp:TextBox ID="txtEmail" runat="server" CssClass="form-control" type="email"></asp:TextBox>
                    </div>

                    <div class="form-group">
                        <asp:Label ID="lblMessage" class="label" runat="server" AssociatedControlID="txtMessage">Message:</asp:Label>

                        <asp:TextBox ID="txtMessage" runat="server" CssClass="form-control" type="TextArea" TextMode="MultiLine" Style="height: 200px; background: transparent; color: white; border: 2px solid blue"></asp:TextBox>
                    </div>
                    <div class="form-group">
                        <asp:Button ID="Submit_Button" class="button" runat="server" Text="Submit" OnClick="Submit_Button_Click" />
                        <br /><br /><br />
                    </div>
                </asp:Panel>
           
            </div>
      <br /><br /><br />
    </div>

</asp:Content>
<%@ Page Title="Profile" Language="C#" AutoEventWireup="true" MasterPageFile="../AdminControl/Site.Master" CodeBehind="Profile.aspx.cs" Inherits="AdminControl.Profile" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="AdminContent" runat="server">


    <html>
    <head>
        <title>Profile</title>
        <style>
            .card {
                width: 335px;
                height: 445px;
                top: 20%;
                background: aqua;
                border-radius: 10px;
                z-index: 2;
                overflow: hidden;
                display: flex;
                flex-direction: column;
            }

                .card .card-body .inner {
                    position: absolute;
                    top: 33%;
                    margin-left: 63px;
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
                    margin-top: 297px;
                }

                    .card .card-footer .inner {
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                    }



                        .card .card-footer .inner div:last-child {
                            font-size: 14px;
                            letter-spacing: 1px;
                            color: black;
                        }

            .color__gray {
                color: gray;
            }

            .bi.bi-pencil-square {
                cursor: pointer;
            }

            #EditModal {
                background: rgba(162, 181, 192, 0.11);
                border-radius: 16px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(9.4px);
                -webkit-backdrop-filter: blur(9.4px);
                border: 1px solid rgba(162, 181, 192, 0.3);
            }

            #Uploadfile {
                display: none;
            }

            .PreviewImage {
                width: 200px;
                height: 200px;
                border: 1px solid white;
                margin-top: -64px;
                border-radius: 40px;
            }

            .row-list {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                list-style-type: none;
                padding: 0;
                justify-content: flex-start;
            }

                .row-list li {
                    margin-right: 10px;
                    margin-bottom: 10px;
                    margin-left:10px;/* Adjust the spacing between items as needed */
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
        <%--    AdminControl--%>
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <br />
                            <b style="font-size: 30px; margin-left: 15px;">Profile</b>
                            <i class="bi bi-pencil-square" data-toggle="modal" data-target="#staticBackdrop" style="font-size: 30px; margin-left: 150px;"></i>
                        </div>
                        <div class="card-body">

                            <div class="inner">
                                <img src="<%=ImageUrl %>" alt="Profile" class="PreviewImage" />
                                <div style="font-size: 18px; letter-spacing: .5px; margin-bottom: 10px;"><b style="font-size: 27px;"><%=Name%></b></div>
                                <div style="font-size: 13px; letter-spacing: .5px;">
                                    <span class="label label-primary"><%=currentUser %></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="inner">
                                <div><%=TasksCreated%></div>
                                <div class="color__gray">Events</div>
                            </div>
                            <div class="inner">
                                <div><%=TasksCreated%></div>
                                <div class="color__gray">
                                    &nbsp;Tasks
                        <br />
                                    Created
                                </div>
                            </div>
                            <div class="inner">
                                <div><%=TasksCompleted%></div>
                                <div class="color__gray">
                                    &nbsp;&nbsp;&nbsp;Tasks
                        <br />
                                    Completed
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br /><br />
                <div class="col-md-1"><br /><br /></div>
                <div class="col-md-7">
                    <div id="Users" style="border:1px solid aqua; margin-top: -36px;"><br />
                       <center> <label class="label label-success" style="font-size: 25px;">Users</label></center>
                        <br />
                        <br />
                        <br />
                        <asp:Repeater ID="UsersRepeater" runat="server" OnItemCommand="UsersRepeater_ItemCommand">
                            <HeaderTemplate>
                                <ul class="row-list">
                            </HeaderTemplate>
                            <ItemTemplate>
                                <li>
                                   
                                    <button type="button" class="btn btn-primary"><%# Eval("Name") %></button>
<%--                                    <asp:Button id="btnNames" type="button" runat="server" class="btn btn-primary" Text="<%#Name%>" CommandName="ViewUser" CommandArgument='<%# Eval("Email ") %>' EnableEventValidation="false"/>--%>
                                        <span>
                                            <asp:ImageButton ID="btnDelete" runat="server" data-toggle="tooltip" title="Delete" CommandName="Delete" CommandArgument='<%# Eval("Email ") %>' ImageUrl="~/Images/delete.png" EnableEventValidation="true" OnClientClick="return confirm ('Are you sure you sure to Delete ?')" Style="width: 30px" />
                                        </span>
                              
                                    


                                </li>
                            </ItemTemplate>
                            <FooterTemplate>
                                </ul>
                            </FooterTemplate>
                        </asp:Repeater>
                        <center>
                            <asp:Label ID="lblUser" runat="server" ForeColor="White"></asp:Label>
                        </center>
                        
                      
                        <br />
                        <br />
                        <br />
                    </div>
                </div>
            </div>

        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" id="EditModal">
                    <div class="modal-header">
                        <div style="background: white; float: right;">
                            <button type="button" aria-label="Close" data-toggle="tooltip" title="close" data-dismiss="modal" style="width: 20px;">X</button>

                        </div>
                        <h4 class="modal-title" style="color: greenyellow;">Edit</h4>
                    </div>
                    <div class="modal-body">
                        <center>
                            <asp:Button ID="RemovePic" CssClass="btn btn-danger" runat="server" Text="Remove Profile" OnClick="RemovePic_Click" />
                            <button id="ChangePic" type="button" class="btn btn-success">Change Pic</button>
                            <br />
                            <br />
                            <br />
                            <div id="Uploadfile">
                                <div class="form-group">
                                    <asp:FileUpload ID="FileUpload1" runat="server" />
                                    <div id="Preview ">
                                        <asp:Image runat="server" ID="PreviewImage" Width="200" Height="200" Style="margin-top: 20px; border-radius: 19px;" />
                                    </div>
                                    <br />
                                    <br />
                                    <asp:Button ID="btnUpload" class="btn btn-success " runat="server" Text="Submit" OnClick="btnUpload_Click" />
                                    <asp:Button ID="btnRemove" CssClass="btn btn-danger" runat="server" Text="Cancel" />

                                </div>
                            </div>
                        </center>
                    </div>

                </div>
            </div>
        </div>

    </body>
    <script>
        $(document).ready(function () {

            /* AdminControl*/

            $("#<%= FileUpload1.ClientID%>").change(function () {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#<%= PreviewImage.ClientID%>").fadeIn("slow", function () {
                        $(this).attr("src", e.target.result).fadeIn();
                    })
                }
                reader.readAsDataURL($(this)[0].files[0]);
            });

            $("#ChangePic").click(function () {

                $("#Uploadfile").css("display", "block");

            });

            $("#btnRemove").click(function () {

                location.reload(true);
            });


        });
    </script>

    </html>

</asp:Content>

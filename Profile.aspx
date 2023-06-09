﻿<%@ Page Title="Profile" Language="C#" AutoEventWireup="true" MasterPageFile="~/Site.Master" CodeBehind="Profile.aspx.cs" Inherits="TaskTracker.Profile" %>

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

            .card {
                width: 335px;
                height: 445px;
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
        <%--    TaskTracker--%>

        <div class="card">
            <div class="card-header">
                <br />
                <b style="font-size: 30px; margin-left: 15px;">Profile</b>
                <i class="bi bi-pencil-square" data-toggle="modal" data-target="#staticBackdrop" style="font-size: 30px; margin-left: 150px;"></i>
            </div>
            <div class="card-body">

                <div class="inner">
                    <img src="<%=ImageUrl %>" alt="Profile" class="PreviewImage" />
                    <div style="font-size: 18px; letter-spacing: .5px; margin-bottom: 10px;"><b style="font-size:27px;" ><%=Name%></b></div>
                    <div style="font-size: 13px; letter-spacing: .5px;">
                        <span class="label label-primary"><%=currentUser %></span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="inner">
                    <div><%=EventsCount%></div>
                    <div class="color__gray">Events</div>
                </div>
                <div class="inner">
                    <div><%=TasksCreated%></div>
                    <div class="color__gray">
                        &nbsp;Tasks
                        <br />
                        Pending
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
                            <button id="ChangePic" type="button" class="btn btn-success">Change Pic </button>
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
        <%--        CREATE TABLE [dbo].[Events](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[EventName] [varchar](8000) NOT NULL,
	[UserName] [varchar](50) NOT NULL,
	[CreatedOn] [datetime] NOT NULL,
	[RemainderOn] [datetime] NULL,
	[status] [int] NOT NULL CONSTRAINT [default_value_event]  DEFAULT ((0)),
	
) ON [PRIMARY]

    usersdata procedure

if(@Action='AdminProfile')
begin
select count(*) as NoOfEvents  from dbo.Events  -- no of Events
select count(*) as NoOfTasks from tasks -- no of tasks
select count(*)-1 as NoOfUsers from Register --no of users

end

if(@Action='Update')
begin
declare @count varchar(100);
declare @count1 varchar(100);
declare @count2 varchar(100);
--Tasks
set @count= (select count(*)  from dbo.Events where UserName=@user)  -- Events
update Register set Events=@count where Email=@user

set @count1= (select count(*) from tasks where status=0 and UserName=@user) -- pending
update Register set TasksCreated=@count1 where Email=@user

set @count2= (select count(*) from tasks where status=1 and UserName=@user) --completed
update Register set TasksCompleted=@count2 where Email=@user

if(@count>0 or @count1>0 or @count2>0)
begin
select * from Register where email = @user
end
end

    --%>
    </body>
    <script>

        $(document).ready(function () {

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
    <%--    TaskTracker--%>
</asp:Content>

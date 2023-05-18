<%@ Page Title="ToDoList" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="ToDoList.aspx.cs" Inherits="TaskTracker.ToDoList" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
    <main>
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-3" style="top:24px;">
                    <br />
                    <div class="form-group">
                        <asp:Label ID="lblTask" CssClass="label" runat="server" AssociatedControlID="txtTask">Task:</asp:Label><br />
                        <br />
                        <asp:TextBox ID="txtTask" runat="server" CssClass="form-control" type="TextArea" placeholder="Enter Your Task" TextMode="MultiLine" Style="height: 200px; background: transparent; color: white; border: 2px solid blue"></asp:TextBox>
                    </div>

                    <div class="form-group">
                        <asp:Button ID="Add_Button" CssClass="button" runat="server" Text="Add" OnClick="Add_Button_Click" />

                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-sm-8" style="top:40px;" >
                    <div class="jumbotron" style="min-height: 500px; border-radius: 60px;">
                        <div class="row">

                            <div class="col-sm-3">
                                <h2 class="labelhead">Pending Tasks</h2>
                            </div>
                            <div class="col-sm-9">
                                <asp:Button ID="Task_History" runat="server" CssClass="button" Text="View History" OnClick="Task_History_Click" Style="float: right;" Font-Bold="True" /><br />
                                <br />

                                <script>
                                    $(function () {
                                        $("#datepicker").datepicker({
                                            autoclose: true,
                                            todayHighlight: true,
                                        });
                                    });
                                </script>
                                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
                                </script>
                                <br />
                                <div  style="float: right;">

                                    <div class="col-sm-3"> 
                                        <asp:Button ID="ViewAll" runat="server" CssClass="btn btn-primary" Text="ViewAll" OnClick="ViewAll_Click" /> </div>
                                 
                                    <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy" style="float:right">
                                        <asp:TextBox ID="DateInput" runat="server" class="form-control" BackColor="Transparent" BorderStyle="Solid" AutoPostBack="true" OnTextChanged="DateInput_TextChanged"></asp:TextBox>
                                        <span class="input-group-addon" style="border:2px solid blue">
                                            <i class="glyphicon glyphicon-calendar" data-toggle="tooltip" title="Select a date"></i>
                                        </span>
                                    </div>

                                </div>




                            </div>
                        </div>

                        <br />
                        <asp:Repeater ID="GridRepeat" runat="server" OnItemCommand="GridRepeat_ItemCommand">

                            <HeaderTemplate>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.no</th>
                                            <th scope="col" style="width:75%">Task</th>
                                            <th scope="col">Completed</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                            </HeaderTemplate>
                            <ItemTemplate>
                                <tbody>
                                    <tr>
                                        <th scope="row"><%# Eval("id") %> </th>
                                        <td><%# Eval("Task") %></td>
                                        <td>                                         
                                                <asp:CheckBox ID="chkSelect" CssClass="check" runat="server" data-toggle="tooltip" title="mark as completed" AutoPostBack="true" CommandArgument='<%# Eval("oid") %>' OnCheckedChanged="chkSelect_CheckedChanged" />                                         
                                        </td>
                                        <td class="text-nowrap" style="text-align: center">
                                            <asp:Label ID="lblrpt" runat="server" Text='<%# Eval("oid") %>' Visible="False"></asp:Label>
                                            <asp:ImageButton ID="ImageButton" runat="server" data-toggle="tooltip" title="Edit" CommandName="Edit" CommandArgument='<%# Eval("oid") %>' ImageUrl="~/Images/edit.png" EnableEventValidation="false" Style="width: 30px" />&nbsp;&nbsp;

                                        <asp:ImageButton ID="btnDelete" runat="server" data-toggle="tooltip" title="Delete" CommandName="Delete" CommandArgument='<%# Eval("oid") %>' ImageUrl="~/Images/delete.png" EnableEventValidation="false" OnClientClick="return confirm ('Are you sure you sure to Delete ?')" Style="width: 30px" />

                                        </td>
                                    </tr>

                                </tbody>

                            </ItemTemplate>
                            <FooterTemplate>
                                </table>
                            </FooterTemplate>

                        </asp:Repeater>

                        <asp:Label ID="lblGrid" runat="server" Font-Bold="true" ForeColor="White"></asp:Label>
                    </div>
                </div>
            </div>
        </div>
    </main>

</asp:Content>
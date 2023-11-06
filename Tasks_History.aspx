<%@ Page Title="Tasks History" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Tasks_History.aspx.cs" Inherits="TaskTracker.Tasks_History" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
    <div class="container">
        <br /><br /><br />
    </div>
    <div class="jumbotron" style="border-radius: 60px;">
        <div class="row">

            <div class="col-sm-3">
                <h2 class="labelhead">Task History</h2>

            </div>
            <div class="col-sm-9" >
                <asp:Button ID="ToDoList" CssClass="button" runat="server" Text="Add Task" OnClick="ToDoList_Click" Style="float: right;" /><br />
                <br />

                <script>
                    $(function () {
                        $("#datepicker").datepicker({
                            autoclose: true,
                            todayHighlight: true,
                        })
                    });
                </script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                    crossorigin="anonymous">
                </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
                </script>
                <br />
                <div style="float: right;">

                    <div class="col-sm-3">
                        <asp:Button ID="ViewAll" runat="server" CssClass="btn btn-primary" OnClick="ViewAll_Click" Text="ViewAll" />
                    </div>


                    <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy" style="float: right">
                        <asp:TextBox ID="DateInput" runat="server" class="form-control" BackColor="Transparent" BorderStyle="Solid" AutoPostBack="true" OnTextChanged="DateInput_TextChanged"></asp:TextBox>
                        <span class="input-group-addon" style="border: 2px solid blue">
                            <i class="glyphicon glyphicon-calendar" data-toggle="tooltip" title="Select a date"></i>
                        </span>
                    </div>

                </div>
            </div>
        </div>


        <br />
        <asp:Repeater ID="GridRepeat" runat="server" OnItemDataBound="GridRepeat_ItemDataBound" OnItemCommand="GridRepeat_ItemCommand">

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
                            
                                <asp:CheckBox ID="chkSelect" CssClass="check" runat="server" data-toggle="tooltip" title="mark as pending task" AutoPostBack="true" CommandArgument='<%# Eval("oid") %>' OnCheckedChanged="chkSelect_CheckedChanged" Checked="true" />
                        
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

</asp:Content>

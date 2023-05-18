<%@ Page Title="View All" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="GridList.aspx.cs" Inherits="TaskTracker.GridList" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
    <div class="container">
        <br /><br /><br />
    </div>
    <div class="jumbotron" id="GridList">
        <div style="background: white; float: right;">
            <asp:Button ID="Close" runat="server" data-toggle="tooltip" title="close" Onclick="Close_Click" Text="X" />
        </div>

        <h2 class="labelhead"><%=HeaderTitle%></h2>

        <asp:Repeater ID="RepeaterOuter" runat="server">
            <ItemTemplate>

                <h2 style="color: white;"><%# Eval("CompletedOn") %></h2>

                <asp:Repeater ID="RepeaterInner" runat="server" OnItemDataBound="RepeaterInner_ItemDataBound" OnItemCommand="RepeaterInner_ItemCommand" DataSource='<%# Eval("GroupedData") %>'>
                    <HeaderTemplate>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col" style="width: 75%">Task</th>
                                    <th scope="col">Completed</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                    </HeaderTemplate>
                    <ItemTemplate>
                        <tbody>
                            <tr>
                                <td scope="row"><%# Eval("id") %> </td>
                                <td><%# Eval("Task") %></td>
                                <td>
                                    
                                        <asp:CheckBox ID="chkSelect" CssClass="check" runat="server" data-toggle="tooltip" AutoPostBack="true" CommandArgument='<%# Eval("oid") %>' OnCheckedChanged="chkSelect_CheckedChanged" />
                                  
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
            </ItemTemplate>
        </asp:Repeater>

        <asp:Label ID="lblGrid" runat="server" Font-Bold="true" ForeColor="White"></asp:Label>
    </div>



</asp:Content>

<%@ Page Language="C#" AutoEventWireup="true" MasterPageFile="../AdminControl/Site.Master" CodeBehind="Dashboard.aspx.cs" Inherits="AdminControl.Dashboard" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="AdminContent" runat="server">

        <div >
                    <div class="panel">
                        <div class="panel-heading">
                            <h6 class="panel-title">Calendar v1</h6>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li class="fullscreen_element"><a href="javascript:void(0)"></a></li>
                                    <li class="collapse_element"><a class="up" href="javascript:void(0)"></a></li>
                                    <li class="refresh_element"><a href="javascript:void(0)"></a></li>
                                    <li class="close_element"><a href="javascript:void(0)"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="calendar" class="vertical-box-column calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          
</asp:Content>
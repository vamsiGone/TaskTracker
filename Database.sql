USE [master]
GO
CREATE DATABASE [practice]

USE [practice]
GO
/****** Object:  Table [dbo].[Register]    Script Date: 22-May-23 6:27:21 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Register](
	[SNO] [int] IDENTITY(1,1) NOT NULL,
	[Name] [varchar](100) NOT NULL,
	[Email] [varchar](100) NOT NULL,
	[Password] [varchar](100) NOT NULL,
	[PhotoUrl] [varchar](800) NOT NULL DEFAULT ('Images/user.png'),
	[Bio] [varchar](8000) NOT NULL DEFAULT ('Add Bio'),
	[TasksCreated] [int] NOT NULL DEFAULT ((0)),
	[TasksCompleted] [int] NOT NULL DEFAULT ((0))
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Tasks]    Script Date: 22-May-23 6:27:21 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Tasks](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[Task] [varchar](8000) NOT NULL,
	[UserName] [varchar](50) NOT NULL,
	[CompletedOn] [datetime] NULL,
	[status] [int] NOT NULL CONSTRAINT [default_value]  DEFAULT ((0)),
	[CreatedOn] [datetime] NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[Register] ON 

INSERT [dbo].[Register] ([SNO], [Name], [Email], [Password], [PhotoUrl], [Bio], [TasksCreated], [TasksCompleted]) VALUES (1, N'Admin', N'vamsi@admin.com', N'Admin@123#', N'Images/user.png', N'Add Bio', 0, 0)
SET IDENTITY_INSERT [dbo].[Register] OFF
SET IDENTITY_INSERT [dbo].[Tasks] ON 

INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (12, N'hi theree', N'vamsigone001@gmail.com', NULL, 0, CAST(N'2023-05-08 22:50:30.683' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (2, N'hii', N'vamsigone001@gmail.com', CAST(N'2023-05-04 21:46:49.650' AS DateTime), 1, CAST(N'2023-05-04 21:18:30.290' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (3, N'dfgdgdf', N'vamsigone001@gmail.com', CAST(N'2023-05-04 21:56:14.337' AS DateTime), 1, CAST(N'2023-05-04 21:18:49.013' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (4, N'ghfgh', N'vamsigone001@gmail.com', CAST(N'2023-05-04 22:20:58.007' AS DateTime), 1, CAST(N'2023-05-04 21:18:56.320' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (13, N'hi', N'vamsigone001@gmail.com', NULL, 0, CAST(N'2023-05-08 22:51:49.397' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (6, N'hvmngujmhm', N'vamsigone001@gmail.com', CAST(N'2023-05-03 23:40:41.853' AS DateTime), 1, CAST(N'2023-05-04 21:21:02.517' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (7, N'hfdhdfgh dgfdhdg dgf fd dgdfgdh sdfgfdfgd dfhdgjgjhvmvbjghj fhrthrtyryrnvb hfdfhdsgfs dshdsfhd dsgf ds sdgff sdfgsdh sdhdh dffhfhfjhf jdfgjf fjfjf', N'vamsigone001@gmail.com', CAST(N'2023-04-04 23:23:49.800' AS DateTime), 1, CAST(N'2023-05-04 21:30:16.803' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (8, N'hi', N'vamsigone001@gmail.com', NULL, 0, CAST(N'2023-05-04 23:29:15.163' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (9, N'hlskjfjsjf', N'vamsigone001@gmail.com', NULL, 0, CAST(N'2023-05-04 23:29:19.460' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (14, N'hi added now', N'vamsigone001@gmail.com', NULL, 0, CAST(N'2023-05-09 21:15:43.430' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (11, N'gsgdasagsadgsgasdgasgsadgasdgagas  gsgdasagsadgsgasdgasgsadgasdgagas  gsgdasagsadgsgasdgasgsadgasdgagas  gsgdasagsadgsgasdgasgsadgasdgagas  gsgdasagsadgsgasdgasgsadgasdgagas  ', N'vamsigone001@gmail.com', NULL, 0, CAST(N'2023-05-04 23:29:41.370' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (15, N'Helllooo World', N'vamsigone001@gmail.com', NULL, 0, CAST(N'2023-05-09 21:16:17.700' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (16, N'gmgjgkjjkbmnbjhgjhjhv', N'vamsigone001@gmail.com', NULL, 0, CAST(N'2023-05-09 21:23:40.293' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (17, N'hi', N'vamsigone001@gmail.com', CAST(N'2023-05-10 21:19:36.810' AS DateTime), 1, CAST(N'2023-05-10 20:13:30.300' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (18, N'hii', N'vamsigone001@gmail.com', CAST(N'2023-05-10 21:19:09.870' AS DateTime), 1, CAST(N'2023-05-10 21:08:42.933' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (19, N'hi thereeeeeeeeeeeeeee', N'vamsigone001@gmail.com', NULL, 0, CAST(N'2023-05-11 19:52:35.773' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (20, N'added new there', N'vamsigone001@gmail.com', NULL, 0, CAST(N'2023-05-11 21:39:47.740' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (21, N'hello cross mark', N'vamsigone001@gmail.com', NULL, 0, CAST(N'2023-05-11 22:09:50.100' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (22, N'hi theree
', N'vamsigone001@gmail.com', NULL, 0, CAST(N'2023-05-13 20:49:31.143' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (23, N'hi therere today
', N'vamsigone001@gmail.com', NULL, 0, CAST(N'2023-05-17 18:08:33.420' AS DateTime))
SET IDENTITY_INSERT [dbo].[Tasks] OFF
SET ANSI_PADDING ON

GO
/****** Object:  Index [UQ__Register__A9D105341D891212]    Script Date: 22-May-23 6:27:21 PM ******/
ALTER TABLE [dbo].[Register] ADD UNIQUE NONCLUSTERED 
(
	[Email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  StoredProcedure [dbo].[AddTask]    Script Date: 22-May-23 6:27:21 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO





USE [practice]
GO

CREATE procedure [dbo].[DeleteUser](@email varchar(100))
as
begin
Delete from Register where email= @email
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end



CREATE procedure [dbo].[UsersData](
@Action varchar(100),
@user varchar(100)
)
as
begin
if(@Action='Admin')
select * from Register where email <> @user
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com

if(@Action='QueryString')
select * from Register where email = @user
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end




/****** Object:  StoredProcedure [dbo].[ImageUpload]    Script Date: 27-05-2023 12:41:23 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE procedure [dbo].[ImageUpload]
(

@ImageUrl varchar(500)='',
@User varchar(1000)='',
@Action varchar(100)
)
as
begin
if(@Action='Insert')
begin
update Register set PhotoUrl=@ImageUrl where Email=@User
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end


if(@Action='Select')
begin
select PhotoUrl from Register where Email=@User
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end

end
GO



CREATE procedure [dbo].[AddTask]
(
@Action varchar(100),
@Task varchar(8000), 
 
@Email varchar(100)
)
as
begin
if(@Action='Insert')
begin
Insert into Tasks(Task,UserName, CreatedOn)values(@Task,@Email,GETDATE())
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end
end












GO
/****** Object:  StoredProcedure [dbo].[ChangePwd]    Script Date: 22-May-23 6:27:21 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[ChangePwd](
@user varchar(50),
@pwd varchar(50)
)
as
begin
update Register set Password=@pwd where email=@user

if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end

GO
/****** Object:  StoredProcedure [dbo].[CheckEmployeeCredential]    Script Date: 22-May-23 6:27:21 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO


--exec [CheckEmployeeCredential] @LoginID='vam@admin.com',@pwd='Admin@123#'
CREATE procedure [dbo].[CheckEmployeeCredential]
(
@LoginID varchar(500)='',
@pwd  varchar(100)=''
)
as
begin
if exists(select 1 from Register where Email=@LoginID and Password=@pwd)
begin
select 1  as Redirect
select * from Register where Email=@LoginID 
end
else
begin
select 0 as Redirect
end
end







GO
/****** Object:  StoredProcedure [dbo].[DeleteTask]    Script Date: 22-May-23 6:27:21 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO




CREATE procedure [dbo].[DeleteTask]
(
@Action varchar(100),
@id int 
 
)
as
begin
if(@Action='Delete')
begin
Delete from tasks where id=@id
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end
end










GO
/****** Object:  StoredProcedure [dbo].[EditTask]    Script Date: 22-May-23 6:27:21 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO





CREATE procedure [dbo].[EditTask]
(
@Action varchar(100),
@id int 
 
)
as
begin
if(@Action='Edit')
begin
select task from Tasks where id=@id
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end
end











GO
/****** Object:  StoredProcedure [dbo].[Fetch_Order]    Script Date: 22-May-23 6:27:21 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO


-- EXEC Fetch_Order 'Pending','vamsigone001@gmail.com','05-09-2023'

CREATE procedure [dbo].[Fetch_Order](

@Status varchar(100),
@user varchar(50),
@dateIn varchar(50)
)
as
begin
if(@Status='Pending')
begin
select id as oid, ROW_NUMBER() over( order by id asc) as id,task from tasks where status=0 and UserName=@user and Convert(varchar,CreatedOn,105)=@dateIn
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end

if(@Status='History')
begin
select id as oid, ROW_NUMBER() over( order by id asc) as id,task from tasks where UserName=@user and status=1 and Convert(varchar,CompletedOn,105)=@dateIn
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end


end








GO
/****** Object:  StoredProcedure [dbo].[FetchAll]    Script Date: 22-May-23 6:27:21 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE procedure [dbo].[FetchAll](
@Status varchar(50),
@user varchar(50)
)
as
begin
if(@Status='Pending')
begin

select id as oid, ROW_NUMBER() over( order by CreatedOn DESC) as id,task, convert(varchar,CreatedOn,105) CompletedOn from tasks where status=0 and UserName=@user
end

if(@Status='History')
begin

select id as oid, ROW_NUMBER() over( order by CompletedOn DESC) as id,task, convert(varchar,CompletedOn,105) CompletedOn from tasks where status=1 and UserName=@user

end

end



GO
/****** Object:  StoredProcedure [dbo].[PushToPending]    Script Date: 22-May-23 6:27:21 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO





CREATE procedure [dbo].[PushToPending]
(
@Action varchar(100),
@id int 
)
as
begin
if(@Action='PushToPend')
begin
update Tasks set CompletedOn=Null,status=0 where id =@id
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end
end













GO
/****** Object:  StoredProcedure [dbo].[RegisterDetails]    Script Date: 22-May-23 6:27:21 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO


-- exec registerdetails 'check','vamsi','vamsigone00@gmail.com','v@1a2ms34i'

CREATE procedure [dbo].[RegisterDetails]
(
@Action varchar(100),
@Name varchar(100), 
 
@Email varchar(100), 
@Password varchar(100)

)
as
begin
if(@Action='Check')
begin
IF EXISTS(select * from Register where Email=@Email)
select 1 as com
ELSE
select 0 as com

end

if(@Action='Insert')
begin
Insert into Register(Name,Email,Password)values(@Name,@Email,@Password)
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end
end






GO
/****** Object:  StoredProcedure [dbo].[SaveTask]    Script Date: 22-May-23 6:27:21 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO






CREATE procedure [dbo].[SaveTask]
(
@Action varchar(100),
@Task varchar(8000),
@id int
)
as
begin
if(@Action='Save')
begin
update Tasks set task=@Task where id =@id
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end
end












GO
/****** Object:  StoredProcedure [dbo].[TaskCompletedOn]    Script Date: 22-May-23 6:27:21 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO




CREATE procedure [dbo].[TaskCompletedOn]
(
@Action varchar(100),
@id int 
)
as
begin
if(@Action='Update')
begin
update Tasks set CompletedOn=GETDATE(),status=1 where id =@id
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end
end












GO
USE [master]
GO
ALTER DATABASE [practice] SET  READ_WRITE 
GO

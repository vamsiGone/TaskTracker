USE [master]
GO
/****** Object:  Database [practice]    Script Date: 15-05-2023 10:34:44 PM ******/
CREATE DATABASE [practice]

USE [practice]
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
/****** Object:  StoredProcedure [dbo].[ChangePwd]    Script Date: 15-05-2023 10:34:44 PM ******/
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
/****** Object:  StoredProcedure [dbo].[CheckEmployeeCredential]    Script Date: 15-05-2023 10:34:44 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO



CREATE procedure [dbo].[CheckEmployeeCredential]
(
@LoginID varchar(500)

)
as
begin

select * from Register where Email=@LoginID 


end





GO
/****** Object:  StoredProcedure [dbo].[DeleteTask]    Script Date: 15-05-2023 10:34:44 PM ******/
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
/****** Object:  StoredProcedure [dbo].[EditTask]    Script Date: 15-05-2023 10:34:44 PM ******/
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
/****** Object:  StoredProcedure [dbo].[Fetch_Order]    Script Date: 15-05-2023 10:34:44 PM ******/
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
/****** Object:  StoredProcedure [dbo].[FetchAll]    Script Date: 15-05-2023 10:34:44 PM ******/
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
/****** Object:  StoredProcedure [dbo].[PushToPending]    Script Date: 15-05-2023 10:34:44 PM ******/
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
/****** Object:  StoredProcedure [dbo].[RegisterDetails]    Script Date: 15-05-2023 10:34:44 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO


-- exec registerdetails 'check','vamsi','vamsigone00@gmail.com','v@1a2ms34i'

CREATE procedure [dbo].[RegisterDetails]
(
@Action varchar(100),
@Fname varchar(100), 
 
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
Insert into Register(Fname,Email,Password)values(@Fname,@Email,@Password)
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end
end





GO
/****** Object:  StoredProcedure [dbo].[SaveTask]    Script Date: 15-05-2023 10:34:44 PM ******/
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
/****** Object:  StoredProcedure [dbo].[TaskCompletedOn]    Script Date: 15-05-2023 10:34:44 PM ******/
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
/****** Object:  Table [dbo].[Register]    Script Date: 15-05-2023 10:34:44 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Register](
	[SNO] [int] IDENTITY(1,1) NOT NULL,
	[Fname] [varchar](100) NOT NULL,
	[Email] [varchar](100) NOT NULL,
	[Password] [varchar](100) NOT NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Tasks]    Script Date: 15-05-2023 10:34:44 PM ******/
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
	[status] [int] NOT NULL,
	[CreatedOn] [datetime] NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[Register] ON 

INSERT [dbo].[Register] ([SNO], [Fname], [Email], [Password]) VALUES (1, N'vamsi', N'vamsigone001@gmail.com', N'$V@143a#2m@s34i##')
SET IDENTITY_INSERT [dbo].[Register] OFF
SET IDENTITY_INSERT [dbo].[Tasks] ON 

INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (12, N'hi theree', N'vamsigone001@gmail.com', NULL, 0, CAST(0x0000AFFC01786C15 AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (2, N'hii', N'vamsigone001@gmail.com', CAST(0x0000AFF80166EE4F AS DateTime), 1, CAST(0x0000AFF8015F26DF AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (3, N'dfgdgdf', N'vamsigone001@gmail.com', CAST(0x0000AFF80169840D AS DateTime), 1, CAST(0x0000AFF8015F3CD0 AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (4, N'ghfgh', N'vamsigone001@gmail.com', CAST(0x0000AFF801704EBA AS DateTime), 1, CAST(0x0000AFF8015F4560 AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (13, N'hi', N'vamsigone001@gmail.com', NULL, 0, CAST(0x0000AFFC0178C853 AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (6, N'hvmngujmhm', N'vamsigone001@gmail.com', CAST(0x0000AFF7018634CC AS DateTime), 1, CAST(0x0000AFF8015FD943 AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (7, N'hfdhdfgh dgfdhdg dgf fd dgdfgdh sdfgfdfgd dfhdgjgjhvmvbjghj fhrthrtyryrnvb hfdfhdsgfs dshdsfhd dsgf ds sdgff sdfgsdh sdhdh dffhfhfjhf jdfgjf fjfjf', N'vamsigone001@gmail.com', CAST(0x0000AFDA018192CC AS DateTime), 1, CAST(0x0000AFF8016262D1 AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (8, N'hi', N'vamsigone001@gmail.com', NULL, 0, CAST(0x0000AFF801831015 AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (9, N'hlskjfjsjf', N'vamsigone001@gmail.com', NULL, 0, CAST(0x0000AFF80183151E AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (14, N'hi added now', N'vamsigone001@gmail.com', NULL, 0, CAST(0x0000AFFD015E6355 AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (11, N'gsgdasagsadgsgasdgasgsadgasdgagas  gsgdasagsadgsgasdgasgsadgasdgagas  gsgdasagsadgsgasdgasgsadgasdgagas  gsgdasagsadgsgasdgasgsadgasdgagas  gsgdasagsadgsgasdgasgsadgasdgagas  ', N'vamsigone001@gmail.com', NULL, 0, CAST(0x0000AFF801832ECB AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (15, N'Helllooo World', N'vamsigone001@gmail.com', NULL, 0, CAST(0x0000AFFD015E8B7E AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (16, N'gmgjgkjjkbmnbjhgjhjhv', N'vamsigone001@gmail.com', CAST(0x0000AFFE015F77C4 AS DateTime), 1, CAST(0x0000AFFD01609228 AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (17, N'hi', N'vamsigone001@gmail.com', CAST(0x0000AFFE015F74D3 AS DateTime), 1, CAST(0x0000AFFE014D4C92 AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (18, N'hii', N'vamsigone001@gmail.com', CAST(0x0000AFFE015F5541 AS DateTime), 1, CAST(0x0000AFFE015C7690 AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (19, N'hi thereeeeeeeeeeeeeee', N'vamsigone001@gmail.com', NULL, 0, CAST(0x0000AFFF01478E6C AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (20, N'added new there', N'vamsigone001@gmail.com', NULL, 0, CAST(0x0000AFFF0164FFE2 AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (21, N'hello cross mark', N'vamsigone001@gmail.com', CAST(0x0000AFFF017565AF AS DateTime), 1, CAST(0x0000AFFF016D4006 AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (22, N'hi theree
', N'vamsigone001@gmail.com', NULL, 0, CAST(0x0000B001015730CF AS DateTime))
SET IDENTITY_INSERT [dbo].[Tasks] OFF
SET ANSI_PADDING ON

GO
/****** Object:  Index [UQ__Register__A9D1053475448F06]    Script Date: 15-05-2023 10:34:44 PM ******/
ALTER TABLE [dbo].[Register] ADD UNIQUE NONCLUSTERED 
(
	[Email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
ALTER TABLE [dbo].[Tasks] ADD  CONSTRAINT [default_value]  DEFAULT ((0)) FOR [status]
GO
USE [master]
GO
ALTER DATABASE [practice] SET  READ_WRITE 
GO

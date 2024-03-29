USE [master]
GO
/****** Object:  Database [TaskTracker]    Script Date: 07-11-2023 09:58:24 PM ******/
CREATE DATABASE [TaskTracker]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'practice', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\TaskTracker.mdf' , SIZE = 3264KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'practice_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\TaskTracker_log.ldf' , SIZE = 2368KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [TaskTracker] SET COMPATIBILITY_LEVEL = 120
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [TaskTracker].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [TaskTracker] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [TaskTracker] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [TaskTracker] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [TaskTracker] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [TaskTracker] SET ARITHABORT OFF 
GO
ALTER DATABASE [TaskTracker] SET AUTO_CLOSE ON 
GO
ALTER DATABASE [TaskTracker] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [TaskTracker] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [TaskTracker] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [TaskTracker] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [TaskTracker] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [TaskTracker] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [TaskTracker] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [TaskTracker] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [TaskTracker] SET  DISABLE_BROKER 
GO
ALTER DATABASE [TaskTracker] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [TaskTracker] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [TaskTracker] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [TaskTracker] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [TaskTracker] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [TaskTracker] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [TaskTracker] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [TaskTracker] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [TaskTracker] SET  MULTI_USER 
GO
ALTER DATABASE [TaskTracker] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [TaskTracker] SET DB_CHAINING OFF 
GO
ALTER DATABASE [TaskTracker] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [TaskTracker] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
ALTER DATABASE [TaskTracker] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [TaskTracker] SET QUERY_STORE = OFF
GO
USE [TaskTracker]
GO
/****** Object:  Table [dbo].[Events]    Script Date: 07-11-2023 09:58:24 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Events](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[EventName] [varchar](8000) NOT NULL,
	[UserName] [varchar](50) NOT NULL,
	[CreatedOn] [datetime] NOT NULL,
	[RemainderOn] [datetime] NULL,
	[status] [int] NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Register]    Script Date: 07-11-2023 09:58:24 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Register](
	[SNO] [int] IDENTITY(1,1) NOT NULL,
	[Name] [varchar](100) NOT NULL,
	[Email] [varchar](100) NOT NULL,
	[Password] [varchar](100) NOT NULL,
	[PhotoUrl] [varchar](800) NOT NULL,
	[TasksCreated] [int] NOT NULL,
	[TasksCompleted] [int] NOT NULL,
	[Events] [int] NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Tasks]    Script Date: 07-11-2023 09:58:24 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
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
SET IDENTITY_INSERT [dbo].[Register] ON 

INSERT [dbo].[Register] ([SNO], [Name], [Email], [Password], [PhotoUrl], [TasksCreated], [TasksCompleted], [Events]) VALUES (1, N'Admin', N'vamsi@admin.com', N'Admin@123#', N'avengers-logo-desktop-bgb6k9l7dezpommn.jpg', 0, 0, 0)
INSERT [dbo].[Register] ([SNO], [Name], [Email], [Password], [PhotoUrl], [TasksCreated], [TasksCompleted], [Events]) VALUES (2, N'vamsi', N'vamsi.g@ishinfo.com', N'V@1a2ms34ii', N'IMG_20210822_162218.jpg', 4, 0, 0)
SET IDENTITY_INSERT [dbo].[Register] OFF
GO
SET IDENTITY_INSERT [dbo].[Tasks] ON 

INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (2, N'on 5th staging of snap should be done', N'vamsi.g@ishinfo.com', NULL, 0, CAST(N'2023-11-06T20:37:11.383' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (3, N'live should be completed for snap piwat', N'vamsi.g@ishinfo.com', NULL, 0, CAST(N'2023-11-06T20:37:41.600' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (4, N'slot booking url should be configured in beta url df', N'vamsi.g@ishinfo.com', NULL, 0, CAST(N'2023-11-06T20:38:15.987' AS DateTime))
INSERT [dbo].[Tasks] ([id], [Task], [UserName], [CompletedOn], [status], [CreatedOn]) VALUES (5, N'fsfasfd', N'vamsi.g@ishinfo.com', NULL, 0, CAST(N'2023-11-06T20:41:52.067' AS DateTime))
SET IDENTITY_INSERT [dbo].[Tasks] OFF
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [UQ__Register__A9D105342B080DA3]    Script Date: 07-11-2023 09:58:24 PM ******/
ALTER TABLE [dbo].[Register] ADD UNIQUE NONCLUSTERED 
(
	[Email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
ALTER TABLE [dbo].[Events] ADD  CONSTRAINT [default_value_event]  DEFAULT ((0)) FOR [status]
GO
ALTER TABLE [dbo].[Register] ADD  DEFAULT ('user.png') FOR [PhotoUrl]
GO
ALTER TABLE [dbo].[Register] ADD  DEFAULT ((0)) FOR [TasksCreated]
GO
ALTER TABLE [dbo].[Register] ADD  DEFAULT ((0)) FOR [TasksCompleted]
GO
ALTER TABLE [dbo].[Register] ADD  DEFAULT ((0)) FOR [Events]
GO
ALTER TABLE [dbo].[Tasks] ADD  CONSTRAINT [default_value]  DEFAULT ((0)) FOR [status]
GO
/****** Object:  StoredProcedure [dbo].[AddTask]    Script Date: 07-11-2023 09:58:24 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
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
/****** Object:  StoredProcedure [dbo].[ChangePwd]    Script Date: 07-11-2023 09:58:24 PM ******/
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
/****** Object:  StoredProcedure [dbo].[CheckEmployeeCredential]    Script Date: 07-11-2023 09:58:24 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
  
  
-- exec [CheckEmployeeCredential] @LoginID='vamsi@admin.com',@pwd='Admin@123#'  
CREATE procedure [dbo].[CheckEmployeeCredential]  
(  
@LoginID varchar(500)='',  
@pwd  varchar(100)=''  
)  
as  
begin
if(@pwd!='')
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
else
if exists(select 1 from Register where Email=@LoginID)  
begin  
select 1  as Redirect    
end  
else  
begin  
select 0 as Redirect  
end
end 

  
  
  
  
  
  
GO
/****** Object:  StoredProcedure [dbo].[DeleteTask]    Script Date: 07-11-2023 09:58:24 PM ******/
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
/****** Object:  StoredProcedure [dbo].[DeleteUser]    Script Date: 07-11-2023 09:58:24 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
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











GO
/****** Object:  StoredProcedure [dbo].[EditTask]    Script Date: 07-11-2023 09:58:24 PM ******/
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
/****** Object:  StoredProcedure [dbo].[Fetch_Order]    Script Date: 07-11-2023 09:58:24 PM ******/
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
/****** Object:  StoredProcedure [dbo].[FetchAll]    Script Date: 07-11-2023 09:58:24 PM ******/
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
/****** Object:  StoredProcedure [dbo].[ImageUpload]    Script Date: 07-11-2023 09:58:24 PM ******/
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
/****** Object:  StoredProcedure [dbo].[PushToPending]    Script Date: 07-11-2023 09:58:24 PM ******/
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
/****** Object:  StoredProcedure [dbo].[RegisterDetails]    Script Date: 07-11-2023 09:58:24 PM ******/
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
/****** Object:  StoredProcedure [dbo].[SaveTask]    Script Date: 07-11-2023 09:58:24 PM ******/
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
/****** Object:  StoredProcedure [dbo].[sp_generate_inserts_new]    Script Date: 07-11-2023 09:58:24 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
    
    
    
--exec sp_generate_inserts 'Clientmaster'    
     CREATE  PROC [dbo].[sp_generate_inserts_new]      
(      
 @table_name varchar(776),    -- The table/view for which the INSERT statements will be generated using the existing data      
 @target_table varchar(776) = NULL,  -- Use this parameter to specify a different table name into which the data will be inserted      
 @include_column_list bit = 1,  -- Use this parameter to include/ommit column list in the generated INSERT statement      
 @from varchar(800) = NULL,   -- Use this parameter to filter the rows based on a filter condition (using WHERE)      
 @include_timestamp bit = 0,   -- Specify 1 for this parameter, if you want to include the TIMESTAMP/ROWVERSION column's data in the INSERT statement      
 @debug_mode bit = 0,   -- If @debug_mode is set to 1, the SQL statements constructed by this procedure will be printed for later examination      
 @owner varchar(64) = NULL,  -- Use this parameter if you are not the owner of the table      
 @ommit_images bit = 0,   -- Use this parameter to generate INSERT statements by omitting the 'image' columns      
 @ommit_identity bit = 0,  -- Use this parameter to ommit the identity columns      
 @top int = NULL,   -- Use this parameter to generate INSERT statements only for the TOP n rows      
 @cols_to_include varchar(8000) = NULL, -- List of columns to be included in the INSERT statement      
 @cols_to_exclude varchar(8000) = NULL, -- List of columns to be excluded from the INSERT statement      
 @disable_constraints bit = 0,  -- When 1, disables foreign key constraints and enables them after the INSERT statements      
 @ommit_computed_cols bit = 0  -- When 1, computed columns will not be included in the INSERT statement      
       
)      
      
AS      
BEGIN      
    
SET NOCOUNT ON      
      
--Making sure user only uses either @cols_to_include or @cols_to_exclude      
IF ((@cols_to_include IS NOT NULL) AND (@cols_to_exclude IS NOT NULL))      
 BEGIN      
  RAISERROR('Use either @cols_to_include or @cols_to_exclude. Do not use both the parameters at once',16,1)      
  RETURN -1 --Failure. Reason: Both @cols_to_include and @cols_to_exclude parameters are specified      
 END      
      
--Making sure the @cols_to_include and @cols_to_exclude parameters are receiving values in proper format      
IF ((@cols_to_include IS NOT NULL) AND (PATINDEX('''%''',@cols_to_include) = 0))      
 BEGIN      
  RAISERROR('Invalid use of @cols_to_include property',16,1)      
  PRINT 'Specify column names surrounded by single quotes and separated by commas'      
  PRINT 'Eg: EXEC sp_generate_inserts titles, @cols_to_include = "''title_id'',''title''"'      
  RETURN -1 --Failure. Reason: Invalid use of @cols_to_include property      
 END      
      
IF ((@cols_to_exclude IS NOT NULL) AND (PATINDEX('''%''',@cols_to_exclude) = 0))      
 BEGIN      
  RAISERROR('Invalid use of @cols_to_exclude property',16,1)      
  PRINT 'Specify column names surrounded by single quotes and separated by commas'      
  PRINT 'Eg: EXEC sp_generate_inserts titles, @cols_to_exclude = "''title_id'',''title''"'      
  RETURN -1 --Failure. Reason: Invalid use of @cols_to_exclude property      
 END      
      
      
--Checking to see if the database name is specified along wih the table name      
--Your database context should be local to the table for which you want to generate INSERT statements      
--specifying the database name is not allowed      
IF (PARSENAME(@table_name,3)) IS NOT NULL      
 BEGIN      
  RAISERROR('Do not specify the database name. Be in the required database and just specify the table name.',16,1)      
  RETURN -1 --Failure. Reason: Database name is specified along with the table name, which is not allowed      
 END      
      
--Checking for the existence of 'user table' or 'view'      
--This procedure is not written to work on system tables      
--To script the data in system tables, just create a view on the system tables and script the view instead   
      
IF @owner IS NULL      
 BEGIN      
  IF ((OBJECT_ID(@table_name,'U') IS NULL) AND (OBJECT_ID(@table_name,'V') IS NULL))       
   BEGIN      
    RAISERROR('User table or view not found.',16,1)      
    PRINT 'You may see this error, if you are not the owner of this table or view. In that case use @owner parameter to specify the owner name.'      
    PRINT 'Make sure you have SELECT permission on that table or view.'      
    RETURN -1 --Failure. Reason: There is no user table or view with this name      
   END      
 END      
ELSE      
 BEGIN      
  IF NOT EXISTS (SELECT 1 FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = @table_name AND (TABLE_TYPE = 'BASE TABLE' OR TABLE_TYPE = 'VIEW') AND TABLE_SCHEMA = @owner)      
   BEGIN      
    RAISERROR('User table or view not found.',16,1)      
    PRINT 'You may see this error, if you are not the owner of this table. In that case use @owner parameter to specify the owner name.'      
    PRINT 'Make sure you have SELECT permission on that table or view.'      
    RETURN -1 --Failure. Reason: There is no user table or view with this name        
   END      
 END      
      
--Variable declarations      
DECLARE  @Column_ID int,         
  @Column_List varchar(8000),       
  @Column_Name varchar(128),       
  @Start_Insert varchar(786),       
  @Data_Type varchar(128),       
  @Actual_Values varchar(8000), --This is the string that will be finally executed to generate INSERT statements      
  @IDN varchar(128)  --Will contain the IDENTITY column's name in the table      
      
--Variable Initialization      
SET @IDN = ''      
SET @Column_ID = 0      
SET @Column_Name = ''      
SET @Column_List = ''      
SET @Actual_Values = ''      
      
IF @owner IS NULL       
 BEGIN      
  SET @Start_Insert = 'INSERT INTO ' + '[' + RTRIM(COALESCE(@target_table,@table_name)) + ']'       
 END      
ELSE      
 BEGIN      
  SET @Start_Insert = 'INSERT ' + '[' + LTRIM(RTRIM(@owner)) + '].' + '[' + RTRIM(COALESCE(@target_table,@table_name)) + ']'         
 END      
      
      
--To get the first column's ID      
      
SELECT @Column_ID = MIN(ORDINAL_POSITION)        
FROM INFORMATION_SCHEMA.COLUMNS (NOLOCK)       
WHERE  TABLE_NAME = @table_name AND      
(@owner IS NULL OR TABLE_SCHEMA = @owner)      
      
      
      
--Loop through all the columns of the table, to get the column names and their data types      
WHILE @Column_ID IS NOT NULL      
 BEGIN      
  SELECT  @Column_Name = QUOTENAME(COLUMN_NAME),       
  @Data_Type = DATA_TYPE       
  FROM  INFORMATION_SCHEMA.COLUMNS (NOLOCK)       
  WHERE  ORDINAL_POSITION = @Column_ID AND       
  TABLE_NAME = @table_name AND      
  (@owner IS NULL OR TABLE_SCHEMA = @owner)      
      
      
      
  IF @cols_to_include IS NOT NULL --Selecting only user specified columns      
  BEGIN      
   IF CHARINDEX( '''' + SUBSTRING(@Column_Name,2,LEN(@Column_Name)-2) + '''',@cols_to_include) = 0       
   BEGIN      
    GOTO SKIP_LOOP      
   END      
  END      
      
  IF @cols_to_exclude IS NOT NULL --Selecting only user specified columns      
  BEGIN      
   IF CHARINDEX( '''' + SUBSTRING(@Column_Name,2,LEN(@Column_Name)-2) + '''',@cols_to_exclude) <> 0       
   BEGIN      
    GOTO SKIP_LOOP      
   END      
  END      
      
  --Making sure to output SET IDENTITY_INSERT ON/OFF in case the table has an IDENTITY column      
  IF (SELECT COLUMNPROPERTY( OBJECT_ID(QUOTENAME(COALESCE(@owner,USER_NAME())) + '.' + @table_name),SUBSTRING(@Column_Name,2,LEN(@Column_Name) - 2),'IsIdentity')) = 1       
  BEGIN      
   IF @ommit_identity = 0 --Determing whether to include or exclude the IDENTITY column      
    SET @IDN = @Column_Name      
   ELSE      
    GOTO SKIP_LOOP         
  END      
        
  --Making sure whether to output computed columns or not      
  IF @ommit_computed_cols = 1      
  BEGIN      
   IF (SELECT COLUMNPROPERTY( OBJECT_ID(QUOTENAME(COALESCE(@owner,USER_NAME())) + '.' + @table_name),SUBSTRING(@Column_Name,2,LEN(@Column_Name) - 2),'IsComputed')) = 1       
   BEGIN    
    GOTO SKIP_LOOP           
   END      
  END      
        
  --Tables with columns of IMAGE data type are not supported for obvious reasons      
  IF(@Data_Type in ('image'))      
   BEGIN      
    IF (@ommit_images = 0)      
     BEGIN      
      RAISERROR('Tables with image columns are not supported.',16,1)      
      PRINT 'Use @ommit_images = 1 parameter to generate INSERTs for the rest of the columns.'      
      PRINT 'DO NOT ommit Column List in the INSERT statements. If you ommit column list using @include_column_list=0, the generated INSERTs will fail.'      
      RETURN -1 --Failure. Reason: There is a column with image data type      
     END      
    ELSE      
     BEGIN      
     GOTO SKIP_LOOP      
     END      
   END      
      
  --Determining the data type of the column and depending on the data type, the VALUES part of      
  --the INSERT statement is generated. Care is taken to handle columns with NULL values. Also      
  --making sure, not to lose any data from flot, real, money, smallmomey, datetime columns      
  SET @Actual_Values = @Actual_Values  +      
  CASE       
   WHEN @Data_Type IN ('char','varchar','nchar','nvarchar')       
    THEN       
     'COALESCE('''''''' + REPLACE(RTRIM(' + @Column_Name + '),'''''''','''''''''''')+'''''''',''NULL'')'  
     WHEN @Data_Type IN ('sql_variant')       
    THEN        
     'COALESCE('''''''' + REPLACE(CONVERT(varchar(8000),' + @Column_Name + '),'''''''','''''''''''')+'''''''',''NULL'')'           
   WHEN @Data_Type IN ('datetime','smalldatetime')       
    THEN       
     'COALESCE('''''''' + RTRIM(CONVERT(char,' + @Column_Name + ',109))+'''''''',''NULL'')'      
   WHEN @Data_Type IN ('uniqueidentifier')       
    THEN        
     'COALESCE('''''''' + REPLACE(CONVERT(char(255),RTRIM(' + @Column_Name + ')),'''''''','''''''''''')+'''''''',''NULL'')'      
   WHEN @Data_Type IN ('text','ntext')       
    THEN        
     'COALESCE('''''''' + REPLACE(CONVERT(char(8000),' + @Column_Name + '),'''''''','''''''''''')+'''''''',''NULL'')'           
   WHEN @Data_Type IN ('binary','varbinary')       
    THEN        
     'COALESCE(RTRIM(CONVERT(char,' + 'CONVERT(int,' + @Column_Name + '))),''NULL'')'        
   WHEN @Data_Type IN ('timestamp','rowversion')       
    THEN        
     CASE       
      WHEN @include_timestamp = 0       
       THEN       
        '''DEFAULT'''       
       ELSE       
        'COALESCE(RTRIM(CONVERT(char,' + 'CONVERT(int,' + @Column_Name + '))),''NULL'')'        
     END      
   WHEN @Data_Type IN ('float','real','money','smallmoney')      
    THEN      
     'COALESCE(LTRIM(RTRIM(' + 'CONVERT(char, ' +  @Column_Name  + ',2)' + ')),''NULL'')'       
   ELSE       
    'COALESCE(LTRIM(RTRIM(' + 'CONVERT(char, ' +  @Column_Name  + ')' + ')),''NULL'')'       
  END   + '+' +  ''',''' + ' + '      
        
  --Generating the column list for the INSERT statement      
  SET @Column_List = @Column_List +  @Column_Name + ','       
      
  SKIP_LOOP: --The label used in GOTO      
      
  SELECT  @Column_ID = MIN(ORDINAL_POSITION)       
  FROM  INFORMATION_SCHEMA.COLUMNS (NOLOCK)       
  WHERE  TABLE_NAME = @table_name AND       
  ORDINAL_POSITION > @Column_ID AND      
  (@owner IS NULL OR TABLE_SCHEMA = @owner)      
      
      
 --Loop ends here!      
 END      
      
--To get rid of the extra characters that got concatenated during the last run through the loop      
SET @Column_List = LEFT(@Column_List,len(@Column_List) - 1)      
SET @Actual_Values = LEFT(@Actual_Values,len(@Actual_Values) - 6)      
      
IF LTRIM(@Column_List) = ''       
 BEGIN      
  RAISERROR('No columns to select. There should at least be one column to generate the output',16,1)      
  RETURN -1 --Failure. Reason: Looks like all the columns are ommitted using the @cols_to_exclude parameter      
 END      
      
--Forming the final string that will be executed, to output the INSERT statements      
IF (@include_column_list <> 0)      
 BEGIN      
  SET @Actual_Values =       
   'SELECT ' +        
   CASE WHEN @top IS NULL OR @top < 0 THEN '' ELSE ' TOP ' + LTRIM(STR(@top)) + ' ' END +       
   '''' + RTRIM(@Start_Insert) +       
   ' ''+' + '''(' + RTRIM(@Column_List) +  '''+' + ''')''' +       
   ' +''VALUES(''+ ' +  @Actual_Values  + '+'')''' + ' ' +       
   COALESCE(@from,' FROM ' + CASE WHEN @owner IS NULL THEN '' ELSE '[' + LTRIM(RTRIM(@owner)) + '].' END + '[' + rtrim(@table_name) + ']' + '(NOLOCK)')      
 END      
ELSE IF (@include_column_list = 0)      
 BEGIN      
  SET @Actual_Values =       
   'SELECT ' +       
   CASE WHEN @top IS NULL OR @top < 0 THEN '' ELSE ' TOP ' + LTRIM(STR(@top)) + ' ' END +       
   '''' + RTRIM(@Start_Insert) +       
   ' '' +''VALUES(''+ ' +  @Actual_Values + '+'')''' + ' ' +       
   COALESCE(@from,' FROM ' + CASE WHEN @owner IS NULL THEN '' ELSE '[' + LTRIM(RTRIM(@owner)) + '].' END + '[' + rtrim(@table_name) + ']' + '(NOLOCK)')      
 END       
      
--Determining whether to ouput any debug information      
IF @debug_mode =1      
 BEGIN      
  PRINT '/*****START OF DEBUG INFORMATION*****'      
  PRINT 'Beginning of the INSERT statement:'      
  PRINT @Start_Insert      
  PRINT ''      
  PRINT 'The column list:'      
  PRINT @Column_List      
  PRINT ''      
  PRINT 'The SELECT statement executed to generate the INSERTs'      
  PRINT @Actual_Values      
  PRINT ''      
  PRINT '*****END OF DEBUG INFORMATION*****/'      
  PRINT ''      
 END      
        
PRINT '--INSERTs generated by ''sp_generate_inserts'' stored procedure written by Vyas'      
PRINT '--Build number: 22'      
PRINT '--Problems/Suggestions? Contact Vyas @ vyaskn@hotmail.com'      
PRINT '--http://vyaskn.tripod.com'      
PRINT ''      
PRINT 'SET NOCOUNT ON'      
PRINT ''      
      
      
--Determining whether to print IDENTITY_INSERT or not      
IF (@IDN <> '')      
 BEGIN      
  PRINT 'SET IDENTITY_INSERT ' + QUOTENAME(COALESCE(@owner,USER_NAME())) + '.' + QUOTENAME(@table_name) + ' ON'      
  PRINT 'GO'      
  PRINT ''      
 END      
      
      
IF @disable_constraints = 1 AND (OBJECT_ID(QUOTENAME(COALESCE(@owner,USER_NAME())) + '.' + @table_name, 'U') IS NOT NULL)      
 BEGIN      
  IF @owner IS NULL      
   BEGIN      
    SELECT  'ALTER TABLE ' + QUOTENAME(COALESCE(@target_table, @table_name)) + ' NOCHECK CONSTRAINT ALL' AS '--Code to disable constraints temporarily'      
   END      
  ELSE      
   BEGIN      
    SELECT  'ALTER TABLE ' + QUOTENAME(@owner) + '.' + QUOTENAME(COALESCE(@target_table, @table_name)) + ' NOCHECK CONSTRAINT ALL' AS '--Code to disable constraints temporarily'      
   END      
      
  PRINT 'GO'      
 END      
      
PRINT ''      
PRINT 'PRINT ''Inserting values into ' + '[' + RTRIM(COALESCE(@target_table,@table_name)) + ']' + ''''      
      
      
--All the hard work pays off here!!! You'll get your INSERT statements, when the next line executes!    
--Print (@Actual_Values)    
EXEC (@Actual_Values)      
      
PRINT 'PRINT ''Done'''      
PRINT ''      
      
      
IF @disable_constraints = 1 AND (OBJECT_ID(QUOTENAME(COALESCE(@owner,USER_NAME())) + '.' + @table_name, 'U') IS NOT NULL)      
 BEGIN      
  IF @owner IS NULL      
   BEGIN      
    SELECT  'ALTER TABLE ' + QUOTENAME(COALESCE(@target_table, @table_name)) + ' CHECK CONSTRAINT ALL'  AS '--Code to enable the previously disabled constraints'      
   END      
  ELSE      
   BEGIN      
    SELECT  'ALTER TABLE ' + QUOTENAME(@owner) + '.' + QUOTENAME(COALESCE(@target_table, @table_name)) + ' CHECK CONSTRAINT ALL' AS '--Code to enable the previously disabled constraints'      
   END      
      
  PRINT 'GO'      
 END      
      
PRINT ''      
IF (@IDN <> '')      
 BEGIN      
  PRINT 'SET IDENTITY_INSERT ' + QUOTENAME(COALESCE(@owner,USER_NAME())) + '.' + QUOTENAME(@table_name) + ' OFF'      
  PRINT 'GO'      
 END      
      
PRINT 'SET NOCOUNT OFF'      
      
      
SET NOCOUNT OFF      
RETURN 0 --Success. We are done!      
END      
GO
/****** Object:  StoredProcedure [dbo].[TaskCompletedOn]    Script Date: 07-11-2023 09:58:24 PM ******/
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
/****** Object:  StoredProcedure [dbo].[UsersData]    Script Date: 07-11-2023 09:58:24 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO


-- Exec usersdata "AdminProfile", "vamsigone00@gmail.com"

CREATE procedure [dbo].[UsersData](
@Action varchar(100),
@user varchar(100)
)
as
begin
if(@Action='Admin')
begin
select * from Register where email <> @user
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end

if(@Action='QueryString')
begin
select * from Register where email = @user
if(@@ROWCOUNT>0)
select 1 as com
else
select 0 as com
end

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

end




GO
USE [master]
GO
ALTER DATABASE [TaskTracker] SET  READ_WRITE 
GO

-- Create table for Consumer Types
create table tblConsumerTypes (
    ConsumerTypeCode int not null,
    ConsumerTypeDescription varchar(50),
    primary key (ConsumerTypeCode)
);

-- Create table for Zones
create table tblZones (
    ZoneID int not null,
    ZoneName varchar(50),
    primary key (ZoneID)
);

-- Create table for Towns
create table tblTowns (
    TownID int not null,
    ZoneID int not null,
    TownName varchar(50),
    primary key (TownID),
    foreign key (ZoneID) references tblZones(ZoneID)
);

-- Create table for Consumers
create table tblConsumer (
    Acctnum int not null,
    Fullname varchar(50),
    AcctName varchar(50) not null,
    AcctAddress varchar(100) not null,
    AcctStatus varchar(10),
    ZoneID int not null,
    TownID int not null,
    ConsumerTypeCode int not null,
    dteDateConnected date,
    primary key (Acctnum),
    foreign key (ZoneID) references tblZones(ZoneID),
    foreign key (TownID) references tblTowns(TownID),
    foreign key (ConsumerTypeCode) references tblConsumerTypes(ConsumerTypeCode)
);

-- Create table for Bill Information
create table tblBillInfo (
    Acctnum int not null,
    Billcode varchar(10),
    TotalEB int,
    TotalServiceCharge int,
    TotalSurCharge int,
    TotalAmountDue int,
    BillingDate date,
    BillDueDate date,
    AmountAfterDueDate int,
    primary key (Acctnum, Billcode),
    foreign key (Acctnum) references tblConsumer(Acctnum)
);

-- Create table for User Access
create table tblUserAccess (
    Username varchar(20) not null,
    password varchar(20) not null,
    AccessType int default 2,
    isApproved boolean,
    DataApproved date
);

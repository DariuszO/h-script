# Manual for working with CMS

# H-SCRIPT

### 1. About HS

### 2. Installation

### 2.1 To local hosting

### 2.2 To hosting

### 3. Setting

### 3.1 Setting up the ref. System

### 4. Setting up investment plans

### 4.1 Setting up charges and days off

### 4.2 "Floating interest"

### 5. Substation setup

## 5.1 General settings

## 5.2 Setting up PerfectMoney

## 5.3 Setting up Payeer / QIWI

## 5.4 Others

### 6.Working with an investor account

### 7.Working with investor balance

### 8.Working with investor deposits

### 9. Investor support

### 9.1 News

### 9.2 Newsletter

### 9.3 FAQ

### 10. Other


### 1.Pro HS

HS (HSCRIPT) cms for investment projects (HYIP), MLM, DU (trusted
management), as well as financial games. HS has been on the market for more than 2 years, has shown itself as
reliable, multifunctional and at the same time easy to maintain cms. C
"boxes", the user can customize all the functionality for himself, including
various investment plans, referral program (including
multilevel, often used in MLM projects), work as with accounts
investor and balance. After installation, more will be available to you
popular PS, with which you can work both manually and automatically.
It is possible to work in a special mode "single currency", in which all
funds entered from different payment systems are combined into a single balance.
The script logic is completely separated from the design (using the Smarty template engine).
The source code of the system is completely open, can be corrected, added without
agreement with the owner. The two main libraries are coded with
IonCube and are domain bound, i.e. they will only work if there is a file
license issued for this domain. Cost of one license (for one domain) **
USD **

### 2. Installation

The system requires PHP5 with installed ioncube_loader 4.4 modules,
mod_rewrite, mbstring, GD2 (captcha rendering) and cURL (interaction with payment
systems).

** 2.1 On local hosting **

Any virtual server is suitable for checking locally. The package goes for free
license for the test1.ru domain. You have to unpack the script locally to a folder
.. \ home \ test1.ru \ www and go to the address http://test1.ru

** 2.2 For hosting **

Upload the script and the resulting server license to the root of the site
Set permissions to 777 on the logs, module, tpl_c folders and on the _config.php files,
cron.php
Create a database in the hosting panel Go to website
Configurator will open (../_config)
Create and REMEMBER a password to enter the Configurator
On the Setup tab, enter the system email (for error notifications) and parameters


Database
On the Install tab, check the "Create and fill base ..." checkbox, select the operating mode
script (login via login / mail and separate / single balance) and fill in the parameters
Administrator account. These settings are global and cannot be changed in
the process of work!

### 3. Setting

For the initial setup, log into the site as an administrator, go to the section
_Settings (../admin/setup/main)_

_Settings basic_

Site name: Write down the name of your project.
Set the heading "utf8 encoding" (for some hosting sites) if you have text on
the site is displayed "kryakozyabrami" this item will help fix the problem.
admin email - write down YOUR email address, they will receive
SYSTEM informational messages from the script
email alert center this mail user will see in the "From" field in
mailing list
Technical work (prohibition of entering the site) when working on the site, we recommend
enable this option, the entrance to the user account during the work will be
closed.
Outgoing IP server these data will be needed, for example, to configure some PS


_Security Settings_

In this menu, you can select the security parameters of the investor account, such as PIN
code, question / answer, IP control, auto logout.

Use https (changes only through https: //) - this menu allows you to control
display via a secure connection (ssl) on the site, for example permanent
redirect to ssl or select specific pages that will go through ssl
Require verification of "Personal parameters" after registration, if the option is active,
the investor will be prompted to fill in personal parameters at the first entrance.

_Settingsinterface_

In this menu, you set up the language versions of the site, the location of the panels, on
which you can place an investment calculator, statistics and other
information.


Show welcome page (Intro) - this page welcomes your site, on
which can be placed, as an example, the choice of the language version of the site. Example

_Settingsmail_
It is possible to configure the parameters of the mail SMTP server, through which it will be
letters will go. If not specified, emails are sent via the php mail () function.

_Scheduler_Settings_
A very important section in which automatic tuning parameters are set
charges, deposits.

For the scheduler to be called

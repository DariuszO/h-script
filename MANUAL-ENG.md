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
license issued for this domain. Cost of one license (for one domain) **USD**

### 2. Installation

The system requires PHP5 with installed ioncube_loader 4.4 modules,
mod_rewrite, mbstring, GD2 (captcha rendering) and cURL (interaction with payment
systems).

**2.1 On local hosting**

Any virtual server is suitable for checking locally. The package goes for free
license for the test1.ru domain. You have to unpack the script locally to a folder
.. \home\test1.ru\ www and go to the address http://test1.ru

**2.2 For hosting**

Upload the script and the resulting server license to the root of the site
Set permissions to 777 on the logs, module, tpl_c folders and on the _config.php files,
cron.php
Create a database in the hosting panel Go to website
Configurator will open (../_config)
Create and REMEMBER a password to enter the Configurator
On the Setup tab, enter the system email (for error notifications) and parameters


Database
On the Install tab, check the "Create and fill base ..." checkbox, select the operating mode
script (login via login/mail and separate/single balance) and fill in the parameters
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
code, question/answer, IP control, auto logout.

Use https (changes only through https://) - this menu allows you to control
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

In order for the scheduler to be called autonomously, it is necessary to register its call from
hosting planner:
**wget -q -O /dev/null "http://demo.h-script.com/hyip/cron" > /dev/null**


or (depending on the server settings) the following options are possible:
**/usr/bin/fetch -q -O /dev/null "http://demo.h-script.com/hyip/cron" > /dev/null
/usr/bin/php -q /home/hscriptc/domains/h-script.com/public_html/demo/hyip/cron.php
/dev/null
/usr/local/bin/php -q $HOME/cron.php /dev/null**

Important! If the hosting has a "failure", you can manually make charges, with
Using the Call Manually button.

Below you can follow the timer of the scheduler call.

The sections _ Confirmations and Captcha _ control the settings for confirming transactions and
Captcha view

**3.1 Setting up the ref. System**

Section _Settings, reference system_
To enable the ref. System, specify the parameter name in the link for
invitations - write the parameter name for the referral link, for example ref.

Important! If you do not fill in this field, the referral system will not work.


The script supports the calculation of ref. percent of

-replenishment the investor has replenished his account
-investment the investor made a contribution to one of the investment plans
accruals from the referral's profit

## It is possible to configure a specific ref. Program for a specific plan, this

## useful when the program uses several types of plans, for example

## "classic" and "piggy bank".

## In the screenshot we see the ref. programs from the deposit (contribution), 3 levels

## 10% -5% -3%

### 4. Setting up investment plans

To set up investment plans (IP), go to
_PlansAdd_

Invisible with this option is not available for the investor directly, you can go to it
only by the decision of the administrator. This is useful if you have a special type for monitors.
or for individual investors
plan group number in HS it is possible to group plans, and migration between


plans (with an ADDITION or withdrawal of part of the deposit) is possible only within the group
Min/Max amount - remember that the max. amount NOT inclusive,

Example
"Plan 1" 10-50 dollars
"Plan 2" 50-100 dollars

with a deposit of $ 50, the deposit goes to plan 2.

Percentage bonus - if you wish, you can set a bonus on deposit, for example 50%, then if
the deposit is 50 dollars, the deposit gets 75 dollars.
Only on weekdays (if the period is not more than a day) - we set up the accrual by
working or calendar days.
When setting “only on weekdays”, you need to specify these “non-working” days in the Calendar.
Percentage of accrual - we set the% of profit for the period, if you use "floating
percent ", then enter the minimum value in the field.
Accrual period * (in hours) - if you have accruals once a day, we set accordingly
period of 24 hours.
Number of periods (0 - indefinitely) -number of charges. If you have an investment
plan of the type "piggy bank", the field is not filled = 0.
Refund percentage after the end of the term - select the entire deposit is returned to
balance or part. If you have part of the deposit included in the accruals and the deposit by
the end of the term is not refundable, then we put

- Reinvestment - In cms, the option of reinvestment "percentage by percentage" is available
(compound interest). This option allows the investor to specify in their deposit
reinvestment percentage.
- Additional deposit - if allowed, it is possible to replenish an active deposit. What if
investment plans in one group, it is even possible to migrate the plan for more
profitable for the investor (if the maximum plan amount is exceeded)
- Withdrawal - the option of early withdrawal of the deposit is available, set the percentage of the fine and
possible hold period when this option is not available
- Restrictions - restrictions on groups and quantity
- Dedicated ref. System - an individual ref. System for the selected plan.
Used if there are different types of plans in the project

The screenshot is an example of a plan
1.5% for 10 days, min / max 10/50 dollars, reinvest 0-100%, additional investment is possible, early
withdrawal after 2 days, 20% penalty.


**4.1 setting up charges and days off**

After configuring the scheduler, go to the section _ Deposits settings_

Automatically make a deposit after replenishment - if the function is active, the amount
replenishment immediately falls on the corresponding SP. If disabled, the investor does
manual deposit from the balance.
Important! Do not forget to write this point in the rules, as often investors
forget to make a deposit after replenishment and lose the investment day.

Accruals are

to each in its own time (automatic) - the script itself "looks" who needs to be credited and when
always at the same time (manual) - manual charge, you yourself control when and what
interest must be accrued (remote control mode)


- Manual charging - fine tuning of manual charging (for remote control)
- Calculator - set the step for reinvestment in the calculator (for example 0 25 50 75 100)
- Statistics - the entered values ​​are added to the "real statistics"

**4.2 "floating interest"**

Such charges are called floating when each time the admin sets a%. To make it
customize you need

1. In the plan settings, do not fill in the line "Percentage of accrual"
2. In _Deposit settings _ select _account manually_
3. In _Depositions of the calculation _ we see the interface, where with each charge you can
set the desired percentage.

### 5. Substation setup

At the moment, the script supports 24 Payment Systems (PS), with most
it is possible to work in automatic mode for replenishment and payments.
To add the required PS go to

_BalancePayment systemsAdd_

**5.1 General settings**

At this stage, we will skip the specific settings for a particular PS, and consider
General settings

-replenishment-

manual - the administrator himself must confirm the investor's replenishment
through a merchant - automatic replenishment

Next, you set up the minimum and maximum amount, and if there is a commission

-output-

Configuring the output mode for a specific PS

Manual - the administrator handles withdrawal requests by himself
Instant - the script itself processes the withdrawal requests (instant)

Limit period (in hours, 0 - no) - you can set the period and amount of the limit for
automatic payments. Example period is 24 hours, the limit amount is 50 dollars, this means that
if the investor withdraws more than $ 50 in 24 hours, payments will be processed already


by hand. This is convenient if you want to restrict the instant and yourself
control major findings from the project.

5.2 Setting up PerfectMoney

## 5.3 Setting up Payeer

## 5.3.1 Configuring QIWI

## 5.3.2 How to set up CASH4PAY

## 5.4 Others

## To configure other PS, visit the PS website, there you will find a description of the settings. ^

### 6. Working with an investor account

For general configuration of the operation of accounts, go to the section


_Accounts settings_

Prevent changing personal data - if the item is active, personal data will be able to
change only administration
Allow "quick" registration and login using accounts of other services
(provider Loginza.ru) - an investor can use his data from social networks to enter
into the project. This item makes registration and login very easy.

- Registration -
Choosing registration parameters
disabled - useful when your project has not started, but the site is already ready
allowed - includes registration on the site
only with a referral link or invitations - limited registration

Multiple registration check - select the check parameter for
multiple registration, verification is available both by IP and by cookies
You can also set the parameters of the login, password, such as the min number of characters and
format (for example, symbols and numbers are required)

Confirmation of the operation via e-mail - if the item is active, registration will go
biphasic with mail check

To change the data of a specific user, go to

_User accounts_


We select the desired user, and edit the data, including the PS data in
additional parameters.

Important! Access level 90 and higher gives the user admin rights

### 7.Working with investor balance

You can work with the investor's balance by adding funds, issuing fines,
charge a referral commission, order a payment and much more.

All functions are available in the section

_balanceoperationscreate_

Select the type of operation, enter the username.


We select the PS in which we will perform the operation, the amount of the operation and, if necessary,
a comment

### 8.Working with investor deposits

In HS it is possible to create a deposit for an investor, close, ADD, change%
reinvest or change the investment plan itself for a specific deposit
user.

_DepositionsDepositions_

We select the deposit we need, you can use the search.


And the interface for working with the user's deposit appears.
Important! If you want to create a new deposit, you first need to make a deposit
by the required amount in the section _balanceoperationscreate_

### 9. Investor support

### 9.1 News

To add news, go to the section

_Newspublicationsadd_


Important! For the text to be in different language versions, use switch tags
languages, example text **{!ru!}текст{!en!}text**

### 9.2 Newsletter

To create a newsletter go to the section

_Messages & SupportlistCreate_

Important! If you want to send messages **to all** users, in the field "recipients"
put *

### 9.3 FAQ

The FAQ section can be created and edited from the site admin area.

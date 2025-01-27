<?php

    setPage('gd_currency_select',$GraphCommonOptions['currency_select']);
    setPage('gd_registration_select',$GraphCommonOptions['gd_registration_select']);
    setPage('gd_accrual_select',$GraphCommonOptions['gd_accrual_select']);
    setPage('gd_deposit_select',$GraphCommonOptions['gd_deposit_select']);
    setPage('gd_contribution_select',$GraphCommonOptions['gd_contribution_select']);
    setPage('gd_withdraw_select',$GraphCommonOptions['gd_withdraw_select']);
    setPage('gd_output_select',$GraphCommonOptions['gd_output_select']);
    setPage('gd_reffs_select',$GraphCommonOptions['gd_reffs_select']);
    
    
    $stats_list=array();
    $stats_total_list=array();
    $date_last_str=date("d", $date_end_project_time).' '.(($_user['uLang'] == 'ru')?$month_short_rus[intval(date("n", $date_end_project_time))]:$month_short_eng[intval(date("n", $date_end_project_time))]);
        
    $date_start_time=$date_start_project_time;        
    while ($date_start_time<=$date_end_project_time)
    {
      $date_from_day=date("d", $date_start_time);
      $date_from_month=date("m", $date_start_time);  
      
      $date_str=$date_from_day.' '.(($_user['uLang'] == 'ru')?$month_short_rus[intval($date_from_month)]:$month_short_eng[intval($date_from_month)]);  
      
      $stats_list[$date_str]=array();  

      $date_start_time+=86400; 
    }    
    
    //users
    $stats_total_list['gd_registration']['total']=0;
    $stats_total_list['gd_registration']['today']=0;
    
    $sql="SELECT COUNT(t1.uID) AS count_users, 
          CONCAT(SUBSTRING(t1.uPTS,1,4),'-',SUBSTRING(t1.uPTS,5,2),'-',SUBSTRING(t1.uPTS,7,2)) AS date_add, 
          DATE_FORMAT(CONCAT(SUBSTRING(t1.uPTS,1,4),'-',SUBSTRING(t1.uPTS,5,2),'-',SUBSTRING(t1.uPTS,7,2)),'%d') AS date_add_day,
          DATE_FORMAT(CONCAT(SUBSTRING(t1.uPTS,1,4),'-',SUBSTRING(t1.uPTS,5,2),'-',SUBSTRING(t1.uPTS,7,2)),'%m') AS date_add_month
          FROM Users AS t1
          WHERE t1.uState=1
          AND t1.uPTS>='".date("Y", $date_start_project_time).sprintf("%02d",date("n", $date_start_project_time)).sprintf("%02d",date("d", $date_start_project_time))."000000'
          AND t1.uPTS<='".date("Y", $date_end_project_time).sprintf("%02d",date("n", $date_end_project_time)).sprintf("%02d",date("d", $date_end_project_time))."235959'
          GROUP BY date_add"; 
   $result = $db->_doQuery($sql);  


   while($row = $db->fetch($result))
   { 
      $date_str=$row['date_add_day'].' '.(($_user['uLang'] == 'ru')?$month_short_rus[intval($row['date_add_month'])]:$month_short_eng[intval($row['date_add_month'])]);  
      $stats_list[$date_str]['gd_registration']=$row['count_users'];
      $stats_total_list['gd_registration']['total']+=$row['count_users'];
      if ($date_last_str == $date_str)
      {
        $stats_total_list['gd_registration']['today']=$row['count_users'];
      }
   }
   
   //Начисление
   $stats_total_list['gd_accrual']['total']=0;
   $stats_total_list['gd_accrual']['today']=0;
   
   //Пополнение
   $stats_total_list['gd_deposit']['total']=0;
   $stats_total_list['gd_deposit']['today']=0;
   
   //Вклад
   $stats_total_list['gd_contribution']['total']=0;
   $stats_total_list['gd_contribution']['today']=0; 
   
   //Снятие
   $stats_total_list['gd_withdraw']['total']=0;
   $stats_total_list['gd_withdraw']['today']=0; 
   
   //Вывод
   $stats_total_list['gd_output']['total']=0;
   $stats_total_list['gd_output']['today']=0; 
   
   //Рефские
   $stats_total_list['gd_reffs']['total']=0;
   $stats_total_list['gd_reffs']['today']=0; 
   
   $sql="SELECT IF(t1.oOper = 'GIVE2', 'GIVE', t1.oOper) AS Oper, t2.cName, 
          CONCAT(SUBSTRING(t1.oCTS,1,4),'-',SUBSTRING(t1.oCTS,5,2),'-',SUBSTRING(t1.oCTS,7,2)) AS date_add, 
          DATE_FORMAT(CONCAT(SUBSTRING(t1.oCTS,1,4),'-',SUBSTRING(t1.oCTS,5,2),'-',SUBSTRING(t1.oCTS,7,2)),'%d') AS date_add_day,
          DATE_FORMAT(CONCAT(SUBSTRING(t1.oCTS,1,4),'-',SUBSTRING(t1.oCTS,5,2),'-',SUBSTRING(t1.oCTS,7,2)),'%m') AS date_add_month,
          SUM(t1.oSum) AS summ_total
          FROM  Opers AS t1
          LEFT JOIN Currs AS t2 ON t1.ocID=t2.cID
          WHERE t1.oCTS>='".date("Y", $date_start_project_time).sprintf("%02d",date("n", $date_start_project_time)).sprintf("%02d",date("d", $date_start_project_time))."000000'
          AND t1.oCTS<='".date("Y", $date_end_project_time).sprintf("%02d",date("n", $date_end_project_time)).sprintf("%02d",date("d", $date_end_project_time))."235959'
          AND t1.ocCurrID='".(!empty($GraphCommonOptions['currency_select'])?$GraphCommonOptions['currency_select']:"USD")."'
          GROUP BY Oper, date_add
          ORDER BY t1.oCTS";
   $result = $db->_doQuery($sql); 
   while($row = $db->fetch($result))
   { 
      $date_str=$row['date_add_day'].' '.(($_user['uLang'] == 'ru')?$month_short_rus[intval($row['date_add_month'])]:$month_short_eng[intval($row['date_add_month'])]);  
      
      if ($row['Oper'] == 'CALCIN')
      {
        $stats_list[$date_str]['gd_accrual']=$row['summ_total'];
        $stats_total_list['gd_accrual']['total']+=$row['summ_total'];
        if ($date_last_str == $date_str)
        {
           $stats_total_list['gd_accrual']['today']=$row['summ_total'];
        }
      }
      elseif ($row['Oper'] == 'CASHIN')
      {
        $stats_list[$date_str]['gd_deposit']=$row['summ_total'];
        $stats_total_list['gd_deposit']['total']+=$row['summ_total'];
        if ($date_last_str == $date_str)
        {
           $stats_total_list['gd_deposit']['today']=$row['summ_total'];
        }
      }
      elseif ($row['Oper'] == 'GIVE')
      {
        $stats_list[$date_str]['gd_contribution']=$row['summ_total'];
        $stats_total_list['gd_contribution']['total']+=$row['summ_total'];
        if ($date_last_str == $date_str)
        {
           $stats_total_list['gd_contribution']['today']=$row['summ_total'];
        }
      }
      elseif ($row['Oper'] == 'TAKE')
      {
        $stats_list[$date_str]['gd_withdraw']=$row['summ_total'];
        $stats_total_list['gd_withdraw']['total']+=$row['summ_total'];
        if ($date_last_str == $date_str)
        {
           $stats_total_list['gd_withdraw']['today']=$row['summ_total'];
        }
      }
      elseif ($row['Oper'] == 'CASHOUT2')
      {
        $stats_list[$date_str]['gd_output']=$row['summ_total'];
        $stats_total_list['gd_output']['total']+=$row['summ_total'];
        if ($date_last_str == $date_str)
        {
           $stats_total_list['gd_output']['today']=$row['summ_total'];
        }
      }
      elseif ($row['Oper'] == 'REF')
      {
        $stats_list[$date_str]['gd_reffs']=$row['summ_total'];
        $stats_total_list['gd_reffs']['total']+=$row['summ_total'];
        if ($date_last_str == $date_str)
        {
           $stats_total_list['gd_reffs']['today']=$row['summ_total'];
        }
      }
   }
   
   setPage('stats_list', $stats_list);    
   setPage('stats_total_list', $stats_total_list);      
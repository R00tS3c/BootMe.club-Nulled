<?php 
session_start();
$page = "Tos";
include 'header.php';
    $runningrip = $odb->query("SELECT COUNT(*) FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0")->fetchColumn(0);
	$slotsx = $odb->query("SELECT COUNT(*) FROM `api` WHERE `slots`")->fetchColumn(0);
	$load    = round($runningrip / $slotsx * 100, 2);	
		
?>

    <main id="main-container" style="min-height: 536px;">
  <div class="content">
<div class="content">
            <h2 class="content-heading text-center">Terms Of Service</h2>
			 <div class="block">
<div class="block-header block-header-default">
<h3 class="block-title">
<strong></strong> Payments
</h3>
<div class="block-options">
<button type="button" class="btn-block-option">
<i class="si si-question"></i>
</button>
</div>
</div>
<div class="block-content block-content-full">
<div id="faq3" role="tablist" aria-multiselectable="true">
<div class="block block-bordered block-rounded mb-5">
<div class="block-header" role="tab" id="faq3_h2">
<a class="font-w600 text-body-color-dark collapsed" data-toggle="collapse" data-parent="#faq3" href="#faq3_q2" aria-expanded="false" aria-controls="faq3_q2">Payments Methods </a>
</div>
<div id="faq3_q2" class="collapse" role="tabpanel" aria-labelledby="faq3_h2" style="">
<div class="block-content border-t">
<div class="row">
<div class="col-md-6 col-xl-6">
<a class="block block-link-pop" href="javascript:void(0)">
<div class="block-content block-content-full text-center">
<i class="fa fa-paypal fa-2x"></i>
</div>
<div class="block-content block-content-full bg-body-light text-center">
<div class="font-w600 mb-5">Paypal</div>
<div class="font-size-sm text-muted">+10$</div>
</div>
</a>
</div>
<div class="col-md-6 col-xl-6">
<a class="block block-link-pop" href="javascript:void(0)">
<div class="block-content block-content-full text-center">
<i class="fa fa-btc fa-2x"></i>
</div>
<div class="block-content block-content-full bg-body-light text-center">
<div class="font-w600 mb-5">BTC</div>
<div class="font-size-sm text-muted">+10$</div>
</div>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
			This Terms and Conditions Agreement (the "Agreement"), made effective as of the 1st day of October, 2016, applies to all products, services and websites ("Services") offered by blizzard-stresser.xyz. ("blizzard-stresser.xyz") or its subsidiaries or affiliated companies. Product and service specific terms and conditions may be posted.</br></br>

USING OUR SERVICES INDICATES THAT YOU ACCEPT THIS AGREEMENT REGARDLESS OF WHETHER OR NOT YOU CHOOSE TO REGISTER, PLACE AN ORDER OR ENTER A SERVICE CONTRACT WITH US. IF YOU DO NOT ACCEPT THIS AGREEMENT, DO NOT USE REGISTER OR USE OUR SERVICES.</br>
</br><bb class="text-danger"><strong><center>WE OFFER ONLY ATTACKS TO CHECK THE STRENGTH OF YOUR SERVER/HOSTING, USING ANOTHER IN blizzard-stresser.xyz NOT AT OUR OWN RISK!</center></strong></bb>
</br></br>
            <div class="block">
			
           <h1 class="font-size-xl text-primary">INTRODUCTION</h1>   
1.1 This Agreement between the end user, You, and blizzard-stresser.xyz consists of the Standard Terms and Conditions for our Services.</br>
1.2 This Agreement is effective as of the 1st day of April, 2015.</br>
1.3 This Agreement may change at any time. blizzard-stresser.xyz will post any changes to this Agreement in advance to the effective date and will provide a more prominent notice, including an email notification, for any significant changes. blizzard-stresser.xyz will maintain an archive containing prior versions of this Agreement for your review. If You do not wish to accept a new version of this Agreement, discontinue use of our Services. 
            </div>
          
		              <div class="block">
           <h1 class="font-size-xl text-primary">COPYRIGHT</h1>   
2.1 All content, graphics, designs, organization, digital media and any other matters related to our Services are protected under applicable copyrights, trademarks, registered trademarks, intellectual property rights and other proprietary rights.</br>
2.2 The copying, redistribution, use or publication of any part or parts of our Services is strictly prohibited without the written discretion of blizzard-stresser.xyz.</br>
2.3 You do NOT acquire ownership rights to any content, documents or other materials when viewed through our Services. The posting of information or materials on our Services does not constitute a waiver of any right in such information or materials. Once information or material is posted on our Services, it becomes the property of blizzard-stresser.xyz.
		   </div>
		   
		              <div class="block">
           <h1 class="font-size-xl text-primary">INTELLECTUAL PROPERTY</h1>   
3.1 blizzard-stresser.xyz offers various information in downloadable form. Downloading such files does not grant ownership of the information contained within.</br>
3.2 Downloadable files may not be sold or redistributed under any circumstances without the written discretion of blizzard-stresser.xyz.
		   </div>
		   
		   		              <div class="block">
           <h1 class="font-size-xl text-primary">MEMBERSHIP</h1>   
4.1 blizzard-stresser.xyz offers membership free of charge.</br>
4.2 Membership is required for access to certain features of our Services.</br>
4.3 Membership does not grant access to all features of our Services. Some features may be a part of a premium service, requiring a service fee for use.</br>
4.4 Your right to use our Services is nontransferable. This includes any and all features that are unlocked when You register with us or purchase premium service.</br>
4.5 Any password or right given to You to obtain information or documents is nontransferable and may only be used by You.</br>
4.6 Any account believed to be in violation of the clauses 4.4 or 4.5, above, will be suspended without any prior notice needed and legal process may be filed against the offending party.</br>
		   </div>
		   
		   		   		              <div class="block">
           <h1 class="font-size-xl text-primary">REFERRALS</h1>   
5.1 blizzard-stresser.xyz offers rewards for referrals.</br>
5.2 To earn referral rewards, You must first become a registered member. Please see Section 4 Membership for details pertaining to membershStress3r.</br>
5.3 Referral rewards will be in the form of an account credit and delivered after the referee's first successful purchase.</br>
5.4 Chargebacks and other disputes by the referee will result in the loss of the referral reward. Referral reward may be returned depending on the outcome of the chargeback or dispute.</br>
5.5 Account credit can be used towards future purchases only and cannot be withdrawn.</br>
		   </div>
		   
		   		   		   		              <div class="block">
           <h1 class="font-size-xl text-primary">ORDERING</h1>   
6.1 To place an order for our Services, You must first become a registered member. Please see Section 4 Membership for details pertaining to membershStress3r.</br>
6.2 Services will not be delivered until payment has cleared.</br>
6.3 Service expiration, if applicable, is calculated once payment has cleared.</br>
6.4 Chargebacks and other disputes will result in immediate service suspension, if applicable. Service may be permanently terminated depending on the outcome of the chargeback or dispute.
		   </div>
		   
		   		   		   		   		              <div class="block">
           <h1 class="font-size-xl text-primary">SALES TAX</h1>   
7.1 blizzard-stresser.xyz is required by law to charge sales tax for our applicable Services.</br>
7.2 Tax Exemption:</br>
7.2.1 No sales tax will be charged if we have a current tax exemption certificate on file for You or your company.</br>
7.2.2 A copy of your tax exempt certificate can be sent via email to domain email address</br>
7.2.3 Any orders placed before we receive the proper tax exemption certificates will be charged applicable sales tax, which cannot be refunded or credited.</br>
		   </div>
		   
		   		   		   		   		   		              <div class="block">
           <h1 class="font-size-xl text-primary">PRICING</h1>   
8.1 All prices are subject to change without any prior notice.</br>
8.2 Any orders that were placed before price changes will not be affected.</br>
8.3 blizzard-stresser.xyz will not honor prices from server errors or from cached pages. If a server error has occurred, any customers affected will be contacted as soon as possible and will be allowed to cancel or edit the affected order. Any resulting refunds will be handled as described in Section 10 Refunds.
		   </div>
		   

		   
		   		   		   		   		   		   		   		              <div class="block">
           <h1 class="font-size-xl text-primary">REFUNDS</h1>   
10.1 Refunds are only granted after the request has been reviewed and approved by blizzard-stresser.xyz.</br>
10.2 All refunds are given without interest.</br>
10.3 Due to the instability of crypto-currency exchange rates, all crypto-currency payments are ineligible for refunds.</br>
10.4 blizzard-stresser.xyz will only refund to the source from which payment was received. This greatly diminishes the possibility of fraud.</br>
		   </div>
		   
		   		   		   		   		   		   		   		   		              <div class="block">
           <h1 class="font-size-xl text-primary">SERVICE ACCESS</h1>   
11.1 While we try to ensure that our Services are available 24 hours a day, we will not be held liable if, for any reason, our Services are unavailable at any time or for any period of time.</br>
11.2 Access to our Services may be suspended temporarily, with or without notice, in the case of critical system failure, maintenance, repair or other reasons beyond our control.</br>
11.3 blizzard-stresser.xyz may offer reasonable compensation for any unexpected backbone service interruptions for all affected parties in the unlikely event such an interruption shall occur.
		   </div>
		   
		   		   		   		   		   		   		   		   		   		              <div class="block">
           <h1 class="font-size-xl text-primary">BANDWIDTH GUARANTEE</h1>   
12.1 We guarantee that Your stress test will be sent with at least 99% of the bandwidth You request. For example, a 1000 Mbps stress test will average at least 990 Mbps.</br>
12.2 Bandwidth is recorded internally before leaving our network. Network losses beyond our control may occur in transit and are not covered by this guarantee.</br>
12.3 This guarantee is only valid under the following limited conditions:</br>
12.3.1 When server usage is less than 90% of server capacity.</br>
12.3.2 When packet size is greater than 32 kB.</br>
12.3.3 When duration is greater than 30 seconds.</br>
12.3.4 When source IP address remains constant throughout the stress test.</br>
12.4 You must open a support ticket to request compensation.</br>
12.5 Compensation will be in the form of an account credit equal to the current month's service charge.</br>
12.6 Subject to internal investigation before account credit is issued.
		   </div>
		   
		   <div class="block">
		              <h1 class="font-size-xl text-primary">VISITOR MATERIAL AND CONDUCT</h1>   
13.1 You are prohibited from stressing internet connections and/or servers that You do not have ownership of or authorization to test.</br>
13.2 You are prohibited from posting or transmitting to or from this website any material that others would deem threatening or discriminatory.</br>
13.3 You are prohibited from distributing any information or downloadable content, freely or for profit, on any other websites or medium.</br>
13.4 You are prohibited from attempting to post or upload any material that is technically harmful, including but not limited to, viruses, spyware, Trojan horses, worms or any other malicious software or harmful data.</br>
13.5 If You misuse our Services, including, but not limited to the methods described above, we will fully cooperate with law enforcement authorities and disclose any information to those authorities that will identify and/or locate anyone in breach of clauses 13.1, 13.2, 13.3 and/or 13.4, above.</br>
		   </div>
		   
		   <div class="block">
		   		              <h1 class="font-size-xl text-primary">LIABLILITY</h1>   
14.1 In no event shall blizzard-stresser.xyz be held liable for any special, incidental or consequential damages or any nature due to the use of our Services and/or any information found with our Services. This includes, but is not limited to, damages resulting in loss of profit or revenue, installation costs, damage to property, personal injury, death and legal expenses.</br>
14.2 You acknowledge that blizzard-stresser.xyz and the manufacturer or supplier of any products or information found on our Services are not to be held responsible for any claim or damage resulting from use.</br>
14.3 Any statements or advice offered or given to You is given without charge. blizzard-stresser.xyz assumes no liability for such statements or advice and the use of such.</br>
14.4 You must agree to indemnify, defend and hold us and our partners, attorneys, staff and affiliates harmless from any liability, loss, claim and expense, including resultant attorney fees, related to your violation of this Agreement and/or use of our Services.
							  </div>
							  
							  		   <div class="block">
		   		              <h1 class="font-size-xl text-primary">DISCLAIMER</h1>   
15.1 While we try to ensure that all information we provide is correct, we do not warrant the accuracy or completeness of any and all material on our Services.</br>
15.2 We may make changes to the information, products and prices on our Services at any time, without prior notice.</br>
15.3 The material on our Services is provided "as is" without any warranties of any kind.</br>
							  </div>
							  
							  							  		   <div class="block">
		   		              <h1 class="font-size-xl text-primary">PRIVACY</h1>   
16.1 By agreeing to this Agreement, You acknowledge that You have read and agree to our Privacy Policy , currently v1.0.</br>
17. ACCEPTABLE USE</br>
17.1 By agreeing to this Agreement, You acknowledge that You have read and agree to our Acceptable Use Policy, currently v1.0.</br>
							  </div>
							  
							  							  							  		   <div class="block">
		   		              <h1 class="font-size-xl text-primary">THIRD PARTY SERVICES</h1>   
18.1 Google, Inc.</br>
18.1.1 Google's Privacy Policy, http://www.google.com/intl/en/policies/privacy/</br>
18.1.2 Google's Terms of Service, http://www.google.com/intl/en/policies/terms/</br>
							  
							  							  							  							  		   <div class="block">
		   		              <h1 class="font-size-xl text-primary">LINKS TO THIRD PARTY WEBSITES</h1>   
19.1 blizzard-stresser.xyz provides links to third party websites solely for your convenience. If You use any of these links, You are leaving our Services and therefore no longer protected by this Agreement.</br>
19.2 blizzard-stresser.xyz has not reviewed all of the information on linked third party websites. We are not in control of nor do we endorse any information found on these websites.</br>
19.4 If You decide to access any of these third party websites, You do so entirely at your own risk and blizzard-stresser.xyz assumes no liability.</br>
If You have any questions or comments concerning this Agreement, please contact us eith in our live chat or ticket system.
							  </div>
							  
							  							  							  							  							  		   <div class="block">
		   		              <h1 class="font-size-xl text-primary text-center">OTHER</h1>   
<bb class="text-danger"><center>Any attacks sent to government website will result in a permanent suspension with out refund.</center></bb>
							  </div>
		   
        </div>
</main>
            <!-- END Main Container -->

        </div>
        </div>
    </main>
</div>
 <!-- END Page Container -->
<?php include('footer.php'); ?>
      
<?php
@ob_start();
@ob_implicit_flush(0);
?>
 /**
     * @OA\Get(
     * path="/api/mailbox/cron/mails/{folder}/{get_mail}",
     * tags={"CRON"},
     * summary="Mailin klasöründeki mailleri çeker",
     * description="Mailin klasöründeki mailleri çeker",
     * @OA\Parameter(
     *    name="get_mail",
     * in="path",
     * description="Mail adresi",
     * required=true,
     * @OA\Schema(type="string",default="",),),
     * @OA\Parameter(
     *    name="folder",
     * in="path",
     * description="Mail klasörü",
     * required=true,
     * @OA\Schema(
     *       type="string",
     *  default="",
     * ),
     * ),
     * @OA\Response(response="200", description="Successful operation"),
     * @OA\Response(response="401", description="Unauthorized"),
     * )
     */
<?php 
@ob_end_flush();
$buffer= ob_get_contents();
ob_end_clean();
function formatter(string $str){
    //clear first
    $str=trim($str);
    $str=str_replace("\n","",$str);
    $str=str_replace("\r","",$str);
    $str=str_replace("\t","",$str);
    $str=str_replace("  ","",$str);
    $str=str_replace("  ","",$str);
    $str=str_replace("/**","",$str);
    $str=str_replace("*/","",$str);
    $str=str_replace("*","",$str);
    $str=str_replace(",)",")",$str);
    //formatter after
    $str=str_replace("),","),\n",$str);
    $str=str_replace("path=","\n path=",$str);
    $str=str_replace("tags=","\n tags=",$str);
    // $str=str_replace("description=","\n description=",$str);
    $str=str_replace("summary=","\n summary=",$str);
    $str=str_replace("@OA\Parameter","\n @OA\Parameter",$str);
    $str=str_replace("@OA\Schema","\n @OA\Schema",$str);
    $str=str_replace("  ","",$str);
    $str=str_replace(",",", ",$str);
    $str=str_replace("\n","\n *",$str);
    $str=str_replace("* *","**",$str);
    $str=preg_replace('/([*])(.)/', ' $1 $2 ', $str);
    $str="/** ".$str."\n  **/";
    $str=str_replace(" *","*",$str);
    $str=str_replace("\n*","",$str);
    // $str=str_replace(", ",", \n",$str);
    

    return $str;
}
echo formatter($buffer);
?>
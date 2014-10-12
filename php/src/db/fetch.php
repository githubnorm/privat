<?php 

if( $list = get('l') ) {

	$query_companies = mysql_query($query['select_companies_where_list'] . "'$list' " . $query['order_by_date'], $db_connection);
	
	if($query_companies) {
		
		while ($row = mysql_fetch_array($query_companies, MYSQL_NUM)) {
			/* $row[0]=`COMPANY_ID`,
			 * $row[1]=`country`,
			 * $row[2]=`city`,
			 * $row[3]=`com_name`,
			 * $row[4]=`com_link`,
			 * $row[5]=`infos`,
			 * $row[6]=`loc_address`,
			 * $row[7]=`loc_link`,
			 * $row[8]=`loc_route`,
			 * $row[9]=`ratings`,
			 * $row[10]=`jobs`,
			 * $row[11]=`notes`,
			 * $row[12]=`list`,
			 */
			echo "
				<div class=\"listLayer\">
					
					<div class=\"contentCellBasic\" style=\"width: 25px;\">
						<div class=\"contentCellLayer\">
							<span class=\"cellCounty\">$row[1]</span><br>
						</div>
					</div>
					
					<div class=\"contentCellBasic\" style=\"width: 24%;\">
						<a class=\"cellCompanyLink\" href=\"$row[4]\" target=\"_blank\">
							<div class=\"contentCellLayer cellHover\" style=\"width:98%;\">
								<span class=\"cellCompany\">$row[3]</span>
								<br>
								<span class=\"cellInfos\">$row[5]</span>
							</div>
						</a>
						<p class=\"clear\">
						<div class=\"contentCellLayer\" style=\"width:98%;\">
							<span class=\"cellNotes\">$row[11]</span>
						</div>
					</div>
					
					<div class=\"contentCellBasic\" style=\"width: 24%;\">
						<a class=\"cellAddressLink\" href=\"$row[7]\" target=\"_blank\">
							<div class=\"contentCellLayer cellHover\" style=\"width:98%;\">
								<span class=\"cellAddress\">$row[6]</span>
								<span class=\"cellCity\">$row[2]</span>
								<br>
								<span class=\"cellRoute\">$row[8]</span><br>
							</div>
						</a>
						<p class=\"clear\">
						<div class=\"contentCellLayer\" style=\"width:98%;\">
							<span class=\"cellRatings\">$row[9]</span>
						</div>
					</div>
			";
			
			echo "<div class=\"contentCellBasic\" style=\"width: 35%;\">";
				if($row[10]>0) {
					// get all jobs with the from the current company
					$query_jobs = mysql_query($query['select_all_jobs_where_company_id'] . $row[0]. " " . $query['order_by_date'], $db_connection);
					if($query_jobs) {
						while ($jobRow = mysql_fetch_array($query_jobs, MYSQL_NUM)) {
							/* $jobRow[0]=`JOB_ID`
							 * $jobRow[1]=`company_id`,
							 * $jobRow[2]=`position`,
							 * $jobRow[3]=`link`,
							 * $jobRow[4]=`notes`
							 */
							echo "
								<div class=\"jobRow\">
									<a href=\"$jobRow[3]\" target=\"_blank\">
										<span class=\"contentCellLayer cellHover\" style=\"width: 85%;\">
											<span class=\"cellPosition\">$jobRow[2]</span>
											<br>
											<span class=\"cellJobNotes\">$jobRow[4]</span>
										</span>
									</a>
									<span class=\"contentCellLayer\">
										<span class=\"button\" style=\"background: lightblue\" onclick=\"editJData($jobRow[0],this)\">
											<img class=\"buttonImgJob\" src=\"img/edit.png\" />
										</span>
										<span class=\"button\" style=\"background: #F6CECE\" onclick=\"deleteData($row[0],$jobRow[0])\">
											<img class=\"buttonImgJob\" src=\"img/delete.png\" />
										</span>
									</span>
								</div>
								<p class=\"clear\">
							";
						}
					} else {
						echo "[ERROR] Query failed!"; exit;
					}
				} else {
					echo "<br>";
				}
			echo "</div>";
			
			echo "
					<div class=\"contentCellBasic\">
						<span class=\"button\" style=\"background: lightgreen\" onclick=\"addJData($row[0])\">
							<img class=\"buttonImgCompany\" src=\"img/add.png\" />
						</span>
						<span class=\"button\" style=\"background: lightblue\" onclick=\"editCData($row[0],this)\">
							<img class=\"buttonImgCompany\" src=\"img/edit.png\" />
						</span>
						<span class=\"button\" style=\"background: #F6CECE\" onclick=\"deleteData($row[0],0)\">
							<img class=\"buttonImgCompany\" src=\"img/delete.png\" />
						</span>
					</div>
					<p style=\"clear: both;\">
				</div>
			";
		}
		
		$query_companies = mysql_query($query['select_all_company_links'], $db_connection);
		
		if($query_companies) {
			echo "<script id=\"allLinks\">";
				echo "companyList = [";
				$isFirstLine = true;
				while ($row = mysql_fetch_array($query_companies, MYSQL_NUM)) {
					if(!$isFirstLine) {
						echo ",";
					}
					echo "'$row[0];$row[1]'";
					$isFirstLine = false;
				}
				echo "];";
			echo "</script>";
		} else {
			echo "<script id=\"allLinks\">";
				echo "companyList = []; // [ERROR] Query failed!";
			echo "</script>";
		}
		
	} else {
		echo "";
	}

} else {
	echo "";
}

?>
<?php 

if( $listID = get('lid') ) {

	$query_companies = mysql_query($query['select_companies_where_list_id'] . "$listID " . $query['order_by_date'], $db_connection);
	
	if($query_companies) {
		
		while ($row = mysql_fetch_array($query_companies, MYSQL_NUM)) {
			/* $row[0]=`companyID`
			 * $row[1]=`country`
			 * $row[2]=`city`
			 * $row[3]=`companyName`
			 * $row[4]=`companyURL`
			 * $row[5]=`companyAddress`
			 * $row[6]=`companyMapURL`
			 * $row[7]=`companyNotes`
			 * $row[8]=`companyRatings`
			 * $row[9]=`jobCount`
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
							</div>
						</a>
						<p class=\"clear\">
						<a class=\"cellAddressLink\" href=\"$row[6]\" target=\"_blank\">
							<div class=\"contentCellLayer cellHover\" style=\"width:98%;\">
								<span class=\"cellAddress\">$row[5]</span> <span class=\"cellCity\">$row[2]</span>
							</div>
						</a>
						<p class=\"clear\">
						<div class=\"contentCellLayer\" style=\"width:98%;\">
							<span class=\"cellRatings\">$row[8]</span>
						</div>
					</div>
					
					<div class=\"contentCellBasic\" style=\"width: 24%;\">
						<div class=\"contentCellLayer\" style=\"width:98%;\">
							<span class=\"cellNotes\">$row[7]</span>
						</div>
					</div>
			";
			
			echo "<div class=\"contentCellBasic\" style=\"width: 35%;\">";
				if($row[9]>0) {
					// get all jobs with the from the current company
					$query_jobs = mysql_query($query['select_all_jobs_where_company_id'] . $row[0]. " " . $query['order_by_date'], $db_connection);
					if($query_jobs) {
						while ($jobRow = mysql_fetch_array($query_jobs, MYSQL_NUM)) {
							/* $jobRow[0]=`jobID`
							 * $jobRow[1]=`companyID`,
							 * $jobRow[2]=`jobPosition`,
							 * $jobRow[3]=`jobPositionURL`,
							 * $jobRow[4]=`jobNotes`
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
					<div class=\"contentCellBasic\">";
					if($listID!=1) {
						echo "<span class=\"button\" style=\"background: lightgrey\" onclick=\"moveData($row[0],".($listID-1).")\"><<</span>";
					}
					if($listID!=3) {
						echo "<span class=\"button\" style=\"background: lightgrey\" onclick=\"moveData($row[0],".($listID+1).")\">>></span>";
					}
			echo "</div>
					<p style=\"clear: both;\">
				</div>";
		}
		
		$query_companies = mysql_query($query['select_all_company_urls'], $db_connection);
		
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
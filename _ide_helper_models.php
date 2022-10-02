<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\CasesMalaysia
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property int $cases_new
 * @property int $cases_import
 * @property int $cases_recovered_cumulative
 * @property int $cases_recovered
 * @property int $cases_active
 * @property int $cases_cluster
 * @property int $cases_unvax
 * @property int $cases_pvax
 * @property int $cases_fvax
 * @property int $cases_boost
 * @property int $cases_child
 * @property int $cases_adolescent
 * @property int $cases_adult
 * @property int $cases_elderly
 * @property int $cases_0_4
 * @property int $cases_5_11
 * @property int $cases_12_17
 * @property int $cases_18_29
 * @property int $cases_30_59
 * @property int $cases_60_69
 * @property int $cases_70_79
 * @property int $cases_80
 * @property int $cluster_import
 * @property int $cluster_religious
 * @property int $cluster_community
 * @property int $cluster_highRisk
 * @property int $cluster_education
 * @property int $cluster_detentionCentre
 * @property int $cluster_workplace
 * @property int|null $cases_cumulative
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia latestOne()
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia query()
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCases04($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCases1217($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCases1829($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCases3059($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCases511($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCases6069($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCases7079($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCases80($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCasesActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCasesAdolescent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCasesAdult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCasesBoost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCasesChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCasesCluster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCasesCumulative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCasesElderly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCasesFvax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCasesImport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCasesNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCasesPvax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCasesRecovered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCasesRecoveredCumulative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCasesUnvax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereClusterCommunity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereClusterDetentionCentre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereClusterEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereClusterHighRisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereClusterImport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereClusterReligious($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereClusterWorkplace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesMalaysia whereUpdatedAt($value)
 */
	class CasesMalaysia extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CasesState
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property string $state
 * @property int $cases_new
 * @property int $cases_import
 * @property int $cases_recovered
 * @property int $cases_active
 * @property int $cases_cluster
 * @property int $cases_unvax
 * @property int $cases_pvax
 * @property int $cases_fvax
 * @property int $cases_boost
 * @property int $cases_child
 * @property int $cases_adolescent
 * @property int $cases_adult
 * @property int $cases_elderly
 * @property int $cases_0_4
 * @property int $cases_5_11
 * @property int $cases_12_17
 * @property int $cases_18_29
 * @property int $cases_30_59
 * @property int $cases_60_69
 * @property int $cases_70_79
 * @property int $cases_80
 * @property int $cases_recovered_cumulative
 * @property int $cases_cumulative
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState latestOne()
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState query()
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState stateWithTake(string $state, int $take)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCases04($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCases1217($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCases1829($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCases3059($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCases511($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCases6069($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCases7079($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCases80($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCasesActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCasesAdolescent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCasesAdult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCasesBoost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCasesChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCasesCluster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCasesCumulative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCasesElderly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCasesFvax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCasesImport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCasesNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCasesPvax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCasesRecovered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCasesRecoveredCumulative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCasesUnvax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CasesState whereUpdatedAt($value)
 */
	class CasesState extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cluster
 *
 * @property int $id
 * @property string $cluster
 * @property string $state
 * @property string $district
 * @property \Illuminate\Support\Carbon|null $date_announced
 * @property \Illuminate\Support\Carbon|null $date_last_onset
 * @property string $category
 * @property string $status
 * @property int $cases_new
 * @property int $cases_total
 * @property int $cases_active
 * @property int $tests
 * @property int $icu
 * @property int $deaths
 * @property int $recovered
 * @property string|null $summary_bm
 * @property string|null $summary_en
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster active()
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster filterByClusterName($clusterName)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster filterByState($state)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereCasesActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereCasesNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereCasesTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereCluster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereDateAnnounced($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereDateLastOnset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereDeaths($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereIcu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereRecovered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereSummaryBm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereSummaryEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereTests($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cluster whereUpdatedAt($value)
 */
	class Cluster extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeathsMalaysia
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property int $deaths_new
 * @property int $deaths_bid_cumulative
 * @property int $deaths_bid
 * @property int $deaths_new_dod
 * @property int $deaths_bid_dod Brought in Death that died of disease
 * @property int $deaths_unvax
 * @property int $deaths_pvax
 * @property int $deaths_fvax
 * @property int $deaths_boost
 * @property int $deaths_tat Turnaround Time : usual amount of time between the time a specimen is received within the laboratory and the result is available
 * @property int $deaths_bid_dod_cumulative
 * @property int|null $deaths_new_cumulative
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia latestOne()
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereDeathsBid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereDeathsBidCumulative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereDeathsBidDod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereDeathsBidDodCumulative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereDeathsBoost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereDeathsFvax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereDeathsNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereDeathsNewCumulative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereDeathsNewDod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereDeathsPvax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereDeathsTat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereDeathsUnvax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsMalaysia whereUpdatedAt($value)
 */
	class DeathsMalaysia extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeathsState
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property string $state
 * @property int $deaths_new
 * @property int $deaths_bid_cumulative
 * @property int $deaths_bid
 * @property int $deaths_new_dod
 * @property int $deaths_bid_dod Brought in Death that died of disease
 * @property int $deaths_unvax
 * @property int $deaths_pvax
 * @property int $deaths_fvax
 * @property int $deaths_boost
 * @property int $deaths_tat Turnaround Time : usual amount of time between the time a specimen is received within the laboratory and the result is available
 * @property int $deaths_bid_dod_cumulative
 * @property int|null $deaths_commutative
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState latestOne()
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState stateWithTake(string $state, int $take)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereDeathsBid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereDeathsBidCumulative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereDeathsBidDod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereDeathsBidDodCumulative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereDeathsBoost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereDeathsCommutative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereDeathsFvax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereDeathsNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereDeathsNewDod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereDeathsPvax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereDeathsTat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereDeathsUnvax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathsState whereUpdatedAt($value)
 */
	class DeathsState extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Hospital
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property string $state
 * @property int $beds
 * @property int $beds_covid Bed for pandemic
 * @property int $beds_noncrit Non Critical Beds
 * @property int $admitted_pui pui mean Patient under investigation
 * @property int $admitted_covid
 * @property int $admitted_total
 * @property int $discharged_pui
 * @property int $discharged_covid
 * @property int $discharged_total
 * @property int $hosp_covid
 * @property int $hosp_pui pui mean Patient under investigation
 * @property int $hosp_noncovid Non Critical Patient
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read int|float $covid_utilisation
 * @property-read int|float $overall_utilisation
 * @property-read mixed $total_patient
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital latestOne()
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital stateWithTake(string $state, int $take)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereAdmittedCovid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereAdmittedPui($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereAdmittedTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereBeds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereBedsCovid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereBedsNoncrit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereDischargedCovid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereDischargedPui($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereDischargedTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereHospCovid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereHospNoncovid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereHospPui($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereUpdatedAt($value)
 */
	class Hospital extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ICU
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property string $state
 * @property int $bed_icu
 * @property int $bed_icu_rep
 * @property int $bed_icu_total
 * @property int $bed_icu_covid
 * @property int $vent
 * @property int $vent_port
 * @property int $icu_covid
 * @property int $icu_pui pui mean Patient under investigation
 * @property int $icu_noncovid
 * @property int $vent_covid
 * @property int $vent_pui pui mean Patient under investigation
 * @property int $vent_noncovid
 * @property int $vent_used
 * @property int $vent_port_used
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read int|float $overall_utilisation
 * @property-read mixed $total_patient
 * @property-read int|float $total_ventilators
 * @property-read int|float $total_ventilators_patient
 * @property-read int|float $ventilation_utilisation
 * @method static \Illuminate\Database\Eloquent\Builder|ICU latestOne()
 * @method static \Illuminate\Database\Eloquent\Builder|ICU newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ICU newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ICU query()
 * @method static \Illuminate\Database\Eloquent\Builder|ICU stateWithTake(string $state, int $take)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereBedIcu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereBedIcuCovid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereBedIcuRep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereBedIcuTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereIcuCovid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereIcuNoncovid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereIcuPui($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereVent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereVentCovid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereVentNoncovid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereVentPort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereVentPortUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereVentPui($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ICU whereVentUsed($value)
 */
	class ICU extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PKRC
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property string $state
 * @property int $beds
 * @property int $admitted_pui pui mean Patient under investigation
 * @property int $admitted_covid
 * @property int $admitted_total
 * @property int $discharge_pui pui mean Patient under investigation
 * @property int $discharge_covid
 * @property int $discharge_total
 * @property int $pkrc_covid
 * @property int $pkrc_pui
 * @property int $pkrc_noncovid
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read int|float $overall_utilisation
 * @property-read mixed $total_patient
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC latestOne()
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC query()
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC stateWithTake(string $state, int $take)
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC whereAdmittedCovid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC whereAdmittedPui($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC whereAdmittedTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC whereBeds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC whereDischargeCovid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC whereDischargePui($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC whereDischargeTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC wherePkrcCovid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC wherePkrcNoncovid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC wherePkrcPui($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PKRC whereUpdatedAt($value)
 */
	class PKRC extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Population
 *
 * @property int $id
 * @property string $state
 * @property int $idxs
 * @property int $pop
 * @property int $pop_18
 * @property int $pop_60
 * @property int $pop_12
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Population newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Population newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Population query()
 * @method static \Illuminate\Database\Eloquent\Builder|Population whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Population whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Population whereIdxs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Population wherePop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Population wherePop12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Population wherePop18($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Population wherePop60($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Population whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Population whereUpdatedAt($value)
 */
	class Population extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TestMalaysia
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property int $rtk_ag
 * @property int $pcr
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read mixed $total_test
 * @method static \Illuminate\Database\Eloquent\Builder|TestMalaysia latestOne()
 * @method static \Illuminate\Database\Eloquent\Builder|TestMalaysia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestMalaysia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestMalaysia query()
 * @method static \Illuminate\Database\Eloquent\Builder|TestMalaysia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestMalaysia whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestMalaysia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestMalaysia wherePcr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestMalaysia whereRtkAg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestMalaysia whereUpdatedAt($value)
 */
	class TestMalaysia extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TestState
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property string $state
 * @property int $rtk_ag
 * @property int $pcr
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read mixed $total_test
 * @method static \Illuminate\Database\Eloquent\Builder|TestState latestOne()
 * @method static \Illuminate\Database\Eloquent\Builder|TestState newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestState newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestState query()
 * @method static \Illuminate\Database\Eloquent\Builder|TestState whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestState whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestState whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestState wherePcr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestState whereRtkAg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestState whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestState whereUpdatedAt($value)
 */
	class TestState extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\VaxMalaysia
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property int $daily_partial
 * @property int $daily_full
 * @property int $daily
 * @property int|null $daily_partial_adol
 * @property int|null $daily_full_adol
 * @property int $daily_partial_child
 * @property int $daily_full_child
 * @property int $daily_booster
 * @property int $cumul_partial
 * @property int $cumul_full
 * @property int $cumul
 * @property int|null $cumul_partial_adol
 * @property int|null $cumul_full_adol
 * @property int $cumul_partial_child
 * @property int $cumul_full_child
 * @property int $cumul_booster
 * @property int $pfizer1
 * @property int $pfizer2
 * @property int|null $pfizer3
 * @property int $sinovac1
 * @property int $sinovac2
 * @property int|null $sinovac3
 * @property int $astra1
 * @property int $astra2
 * @property int|null $astra3
 * @property int $sinopharm1
 * @property int $sinopharm2
 * @property int $sinopharm3
 * @property int $cansino
 * @property int $cansino3
 * @property int $pending1
 * @property int $pending2
 * @property int $pending3
 * @property string $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $daily_booster2
 * @property int $daily_booster_adol
 * @property int $daily_booster2_adol
 * @property int $daily_booster_child
 * @property int $daily_booster2_child
 * @property int $cumul_booster2
 * @property int $cumul_booster_adol
 * @property int $cumul_booster2_adol
 * @property int $cumul_booster_child
 * @property int $cumul_booster2_child
 * @property int $pfizer4
 * @property int $sinovac4
 * @property int $astra4
 * @property int $sinopharm4
 * @property int $cansino4
 * @property int $pending4
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia latestOne()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia query()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereAstra1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereAstra2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereAstra3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereAstra4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCansino($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCansino3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCansino4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCumul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCumulBooster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCumulBooster2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCumulBooster2Adol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCumulBooster2Child($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCumulBoosterAdol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCumulBoosterChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCumulFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCumulFullAdol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCumulFullChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCumulPartial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCumulPartialAdol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereCumulPartialChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereDaily($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereDailyBooster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereDailyBooster2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereDailyBooster2Adol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereDailyBooster2Child($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereDailyBoosterAdol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereDailyBoosterChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereDailyFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereDailyFullAdol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereDailyFullChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereDailyPartial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereDailyPartialAdol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereDailyPartialChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia wherePending1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia wherePending2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia wherePending3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia wherePending4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia wherePfizer1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia wherePfizer2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia wherePfizer3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia wherePfizer4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereSinopharm1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereSinopharm2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereSinopharm3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereSinopharm4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereSinovac1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereSinovac2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereSinovac3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereSinovac4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxMalaysia whereUpdatedAt($value)
 */
	class VaxMalaysia extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\VaxRegMalaysia
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property string $state
 * @property int $total
 * @property int $phase2
 * @property int $mysj
 * @property int $call
 * @property int $web
 * @property int $children
 * @property int $elderly
 * @property int $comorb
 * @property int $oku
 * @property string $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $children_solo
 * @property int $adolescents
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia latestOne()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia query()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia whereAdolescents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia whereCall($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia whereChildren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia whereChildrenSolo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia whereComorb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia whereElderly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia whereMysj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia whereOku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia wherePhase2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegMalaysia whereWeb($value)
 */
	class VaxRegMalaysia extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\VaxRegState
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property string $state
 * @property int $total
 * @property int $phase2
 * @property int $mysj
 * @property int $call
 * @property int $web
 * @property int $children
 * @property int $elderly
 * @property int $comorb
 * @property int $oku
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $children_solo
 * @property int $adolescents
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState latestOne()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState query()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState whereAdolescents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState whereCall($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState whereChildren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState whereChildrenSolo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState whereComorb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState whereElderly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState whereMysj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState whereOku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState wherePhase2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxRegState whereWeb($value)
 */
	class VaxRegState extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\VaxState
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property string $state
 * @property int $daily_partial
 * @property int $daily_full
 * @property int $daily
 * @property int|null $daily_partial_adol
 * @property int|null $daily_full_adol
 * @property int $daily_partial_child
 * @property int $daily_full_child
 * @property int $daily_booster
 * @property int $cumul_partial
 * @property int $cumul_full
 * @property int $cumul
 * @property int|null $cumul_partial_adol
 * @property int|null $cumul_full_adol
 * @property int $cumul_partial_child
 * @property int $cumul_full_child
 * @property int $cumul_booster
 * @property int $pfizer1
 * @property int $pfizer2
 * @property int|null $pfizer3
 * @property int $sinovac1
 * @property int $sinovac2
 * @property int|null $sinovac3
 * @property int $astra1
 * @property int $astra2
 * @property int|null $astra3
 * @property int $sinopharm1
 * @property int $sinopharm2
 * @property int $sinopharm3
 * @property int $cansino
 * @property int $cansino3
 * @property int $pending1
 * @property int $pending2
 * @property int $pending3
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $daily_booster2
 * @property int $daily_booster_adol
 * @property int $daily_booster2_adol
 * @property int $daily_booster_child
 * @property int $daily_booster2_child
 * @property int $cumul_booster2
 * @property int $cumul_booster_adol
 * @property int $cumul_booster2_adol
 * @property int $cumul_booster_child
 * @property int $cumul_booster2_child
 * @property int $pfizer4
 * @property int $sinovac4
 * @property int $astra4
 * @property int $sinopharm4
 * @property int $cansino4
 * @property int $pending4
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState latestOne()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState query()
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereAstra1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereAstra2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereAstra3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereAstra4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCansino($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCansino3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCansino4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCumul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCumulBooster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCumulBooster2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCumulBooster2Adol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCumulBooster2Child($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCumulBoosterAdol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCumulBoosterChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCumulFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCumulFullAdol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCumulFullChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCumulPartial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCumulPartialAdol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereCumulPartialChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereDaily($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereDailyBooster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereDailyBooster2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereDailyBooster2Adol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereDailyBooster2Child($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereDailyBoosterAdol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereDailyBoosterChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereDailyFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereDailyFullAdol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereDailyFullChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereDailyPartial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereDailyPartialAdol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereDailyPartialChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState wherePending1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState wherePending2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState wherePending3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState wherePending4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState wherePfizer1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState wherePfizer2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState wherePfizer3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState wherePfizer4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereSinopharm1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereSinopharm2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereSinopharm3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereSinopharm4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereSinovac1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereSinovac2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereSinovac3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereSinovac4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaxState whereUpdatedAt($value)
 */
	class VaxState extends \Eloquent {}
}


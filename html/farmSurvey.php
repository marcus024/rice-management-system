<?php
session_start();
$_SESSION["cat"] = "Farm";
include("h.php");
?>    

<div class="content-wrapper">
            <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Farm Information /</span> Input Farm Details</h4>
            <div class="row">
            <form id="formAuthentication" class="mb-1" action="farmdetailBack.php" method="POST">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h5 class="card-header">Rice Farm Details</h5>
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            <div></div>
                            <!-- <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Rice Type</span>
                                <input
                                type="textarea"
                                required
                                class="form-control"
                                placeholder="What type of rice?"
                                aria-label="Username"
                                name="riceType"
                                id="riceType"
                                aria-describedby="basic-addon11"
                                />
                            </div> -->
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Rice Type</span>
                                <select
                                    class="form-select"
                                    aria-label="Select Rice Season"
                                    name="riceType"
                                    required
                                >
                                    <option value="">Select Rice Type</option>
                                    <option value="Arborico Rice">Arborico Rice</option>
                                    <option value="Basmati Rice">Basmati Rice</option>
                                    <option value="Black Rice">Black Rice</option>
                                    <option value="Brown Rice">Brown Rice</option>
                                    <option value="Jasmine Rice">Jasmine Rice</option>
                                    <option value="Long Grain White Rice">Long Grain White Rice</option>
                                    <option value="Parboiled Rice">Parboiled Rice</option>
                                    <option value="Sticky Rice">Sticky Rice</option>
                                    <option value="Sushi Rice">Sushi Rice</option>
                                </select>
                            </div>
                            <div></div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Season</span>
                                <select
                                    class="form-select"
                                    aria-label="Select Rice Season"
                                    name="season"
                                    required
                                >
                                    <option value="">Select Rice Season</option>
                                    <option value="Season 1">Season 1</option>
                                    <option value="Season 2">Season 2</option>
                                </select>
                            </div>
                            <div></div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Type of Rice Farm</span>
                                <select
                                    class="form-select"
                                    aria-label="Select Rice Season"
                                    name="riceFarm"
                                    required
                                >
                                    <option value="">Select Rice Farm Type</option>
                                    <option value="Low Land">Low Land</option>
                                    <option value="Up Land">Up Land</option>
                                </select>
                            </div>
                            <div></div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Farm Size (in Hectares)</span>
                                <input
                                type="number"
                                required
                                class="form-control"
                                placeholder="What is the farm size?"
                                aria-label="Username"
                                name="farmSize"
                                id="farmSize"
                                aria-describedby="basic-addon11"
                                />
                            </div>
                            <div></div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Total Production (by sack)</span>
                                <input
                                type="number"
                                required
                                class="form-control"
                                placeholder="What is the total production(by sack)?"
                                aria-label="Username"
                                name="totalProd"
                                id="totalProd"
                                aria-describedby="basic-addon11"
                                />
                            </div>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Year</span>
                                <input
                                type="date"
                                required
                                class="form-control"
                                placeholder="Ex. 2023"
                                aria-label="Username"
                                name="yearW"
                                id="totalProd"
                                aria-describedby="basic-addon11"
                                />
                            </div>
                            <!-- <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">Status</span>
                                <input
                                type="textarea"
                                class="form-control"
                                placeholder="Decrease or Increase?"
                                aria-label="Username"
                                aria-describedby="basic-addon11"
                                />
                            </div> -->
                            <div class = "row">
                                <div>
                                    <label for="exampleFormControlTextarea1" class="form-label">Problem Encounters</label>
                                    <textarea required id="problem" name = "problem" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                </div>
                                <div class="demo-inline-spacing">
                                    <button name = "submit" type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
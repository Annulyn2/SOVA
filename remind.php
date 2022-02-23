<?php
session_start();
include_once 'connect.php';
include_once('navibar.php');

// CHECK IF USER IS LOGGED IN,
// IF NOT, LET THE USER GO BACK TO LOG IN PAGE
// if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
//     header('Location: login.php');
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <title>Reminders</title>
</head>
<style>
    /* div {
        border: 1px solid black;
    } */
    .container {
        margin-top: 100px;
    }

    .res {
        width: 450px;
        height: 500px;
    }

    @media screen and (max-width: 800px) {
        .container {
            width: 100%;
        }

        .res {
            width: 100%;
        }
    }
</style>

<body style="background-color:#F1E6E3;">


    <div class="container">
        <div class="card text-center">
            <div class="card-header" style="background-color:#F9DCD4;">
                <nav class="nav nav-tabs card-header-tabs">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-health-tab" data-bs-toggle="tab" data-bs-target="#nav-health" type="button" role="tab" aria-controls="nav-health" aria-selected="true">Your Health</button>
                        <button class="nav-link" id="nav-covid-tab" data-bs-toggle="tab" data-bs-target="#nav-covid" type="button" role="tab" aria-controls="nav-covid" aria-selected="false">Covid</button>
                        <button class="nav-link" id="nav-swab-tab" data-bs-toggle="tab" data-bs-target="#nav-swab" type="button" role="tab" aria-controls="nav-vaccine" aria-selected="false">Swab Test</button>
                        <button class="nav-link" id="nav-vaccine-tab" data-bs-toggle="tab" data-bs-target="#nav-vaccine" type="button" role="tab" aria-controls="nav-vaccine" aria-selected="false">Vaccine</button>
                    </div>
                </nav>
            </div>
            <div class="card-body text-start">
                <div class="tab-content" id="nav-tabContent">

                    <!-- YOUR HEALTH -->
                    <div class="tab-pane fade show active" id="nav-health" role="tabpanel" aria-labelledby="nav-health-tab">
                        <div class="row mb-2">
                            <div class="col-sm-6 pb-4">
                                <div class="card h-100">
                                    <div class="card-body text-start">
                                        <h5 class="card-title">Wear a mask properly</h5>
                                        <p class="card-text">To properly wear your mask:</p>
                                        <ul>
                                            <li>
                                                Make sure your mask covers your nose, mouth and chin.
                                            </li>
                                            <li>
                                                Clean your hands before you put your mask on, before and after you take it off, and after you touch it at any time.
                                            </li>
                                            <li>
                                                When you take off your mask, store it in a clean plastic bag, and every day either wash it if it’s a fabric mask or dispose of it in a trash bin if it’s a medical mask.
                                            </li>
                                            <li>
                                                Don’t use masks with valves.
                                            </li>
                                        </ul>
                                        <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public" class="btn btn-primary">Read more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 pb-4">
                                <div class="card h-100">
                                    <div class="card-body text-start">
                                        <h5 class="card-title">Keep good hygiene</h5>
                                        <p>To ensure good hygiene you should:</p>
                                        <ul>
                                            <li>Regularly and thoroughly clean your hands with either an alcohol-based hand rub or soap and water. This eliminates germs that may be on your hands, including viruses.</li>
                                            <li>Cover your mouth and nose with your bent elbow or a tissue when you cough or sneeze. Dispose of the used tissue immediately into a closed bin and wash your hands.</li>
                                            <li>
                                                Clean and disinfect surfaces frequently, especially those which are regularly touched, such as door handles, faucets and phone screens.

                                            </li>
                                        </ul>
                                        <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public" class="btn btn-primary">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 pb-4">
                                <div class="card h-100">
                                    <div class="card-body text-start">
                                        <h5 class="card-title">What to do if you feel unwell</h5>
                                        <p class="card-text">If you feel unwell, here’s what to do:</p>
                                        <ul>
                                            <li>
                                                If you have a fever, cough and difficulty breathing, seek medical attention immediately. Call by telephone first and follow the directions of your local health authority.
                                            </li>
                                            <li>
                                                Know the full range of symptoms of COVID-19. The most common symptoms of COVID-19 are fever, dry cough, tiredness and loss of taste or smell. Less common symptoms include aches and pains, headache, sore throat, red or irritated eyes, diarrhoea, a skin rash or discolouration of fingers or toes
                                            </li>
                                            <li>
                                                Stay home and self-isolate for 10 days from symptom onset, plus three days after symptoms cease. Call your health care provider or hotline for advice. Have someone bring you supplies. If you need to leave your house or have someone near you, wear a properly fitted mask to avoid infecting others.

                                            </li>
                                            <li>
                                                Keep up to date on the latest information from trusted sources, such as WHO or your local and national health authorities. Local and national authorities and public health units are best placed to advise on what people in your area should be doing to protect themselves.
                                            </li>
                                        </ul>
                                        <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public" class="btn btn-primary">Read more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 pb-4">
                                <div class="card h-100">
                                    <div class="card-body text-start">
                                        <h5 class="card-title">Make your environment safer</h5>
                                        <p>The risks of getting COVID-19 are higher in crowded and inadequately ventilated spaces where infected people spend long periods of time together in close proximity.</p>
                                        <p>Outbreaks have been reported in places where people have gather, often in crowded indoor settings and where they talk loudly, shout, breathe heavily or sing such as restaurants, choir practices, fitness classes, nightclubs, offices and places of worship</p>

                                        <p>To make your environment as safe as possible:</p>
                                        <ul>
                                            <li>Avoid the 3Cs: spaces that are closed, crowded or involve close contact.</li>
                                            <li>Meet people outside. Outdoor gatherings are safer than indoor ones, particularly if indoor spaces are small and without outdoor air coming in.</li>
                                            <li>
                                                If you can’t avoid crowded or indoor settings, take these precautions:
                                                <ul>
                                                    <li>
                                                        Open a window to increase the amount of natural ventilation when indoors.
                                                    </li>
                                                    <li>
                                                        Wear a mask (see above for more details).
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public" class="btn btn-primary">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- COVID -->
                    <div class="tab-pane fade" id="nav-covid" role="tabpanel" aria-labelledby="nav-covid-tab">

                        <h2 class="text-center">Coronavirus Disease (COVID-19)</h2>

                        <br />
                        <h3>Overview</h3>
                        <div class="row">
                            <div class="col-lg-5">
                                <p>Coronavirus disease (COVID-19) is an infectious disease caused by the SARS-CoV-2 virus.</p>

                                <p>
                                    Most people infected with the virus will experience mild to moderate respiratory illness and recover without requiring special treatment. However, some will become seriously ill and require medical attention. Older people and those with underlying medical conditions like cardiovascular disease, diabetes, chronic respiratory disease, or cancer are more likely to develop serious illness. Anyone can get sick with COVID-19 and become seriously ill or die at any age.
                                </p>

                                <p>
                                    The best way to prevent and slow down transmission is to be well informed about the disease and how the virus spreads. Protect yourself and others from infection by staying at least 1 metre apart from others, wearing a properly fitted mask, and washing your hands or using an alcohol-based rub frequently. Get vaccinated when it’s your turn and follow local guidance.
                                </p>

                            </div>

                            <div class="col-lg-7">
                                <img src="https://i.ytimg.com/vi/lWXHlHp7wqs/maxresdefault.jpg" class="img-fluid w-100 h-100">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>
                                    The virus can spread from an infected person’s mouth or nose in small liquid particles when they cough, sneeze, speak, sing or breathe. These particles range from larger respiratory droplets to smaller aerosols. It is important to practice respiratory etiquette, for example by coughing into a flexed elbow, and to stay home and self-isolate until you recover if you feel unwell.
                                </p>

                                <p>Stay Informed:</p>
                                <ul>
                                    <li><a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public">Advice for the Public</a></li>
                                    <li><a href="http://https://www.who.int/news-room/questions-and-answers/item/coronavirus-disease-covid-19">Myth Busters</a></li>
                                    <li><a href="http://https://www.who.int/news-room/questions-and-answers/item/coronavirus-disease-covid-19">Questions and Answers</a></li>
                                    <li><a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/situation-reports">Situation Reports</a></li>
                                    <li><a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019">All information on the COVID-19 outbreak</a></li>
                                </ul>
                            </div>
                        </div>

                        <h3>Prevention</h3>

                        <div class="row">
                            <div class="col">
                                <p>To prevent infection and to slow transmission of COVID-19, do the following: </p>
                                <ul>
                                    <li>Get vaccinated when a vaccine is available to you.</li>
                                    <li>Stay at least 1 metre apart from others, even if they don't appear to be sick.</li>
                                    <li>Wear a properly fitted mask when physical distancing is not possible or when in poorly ventilated settings.</li>
                                    <li>Choose open, well-ventilated spaces over closed ones. Open a window if indoors.</li>
                                    <li>Wash your hands regularly with soap and water or clean them with alcohol-based hand rub.</li>
                                    <li>Cover your mouth and nose when coughing or sneezing.</li>
                                    <li>If you feel unwell, stay home and self-isolate until you recover.</li>
                                </ul>
                            </div>
                        </div>

                        <h3>Symptoms</h3>

                        <p>COVID-19 affects different people in different ways. Most infected people will develop mild to moderate illness and recover without hospitalization.</p>

                        <p class="fw-bold">Most common symptoms:</p>
                        <ul>
                            <li>fever</li>
                            <li>cough</li>
                            <li>tiredness</li>
                            <li>loss of taste or smell</li>
                        </ul>

                        <p class="fw-bold">Less common symptoms:</p>
                        <ul>
                            <li>sore throat</li>
                            <li>headache</li>
                            <li>aches and pains</li>
                            <li>diarrhoea</li>
                            <li>a rash on skin, or discolouration of fingers or toes</li>
                            <li>red or irritated eyes.</li>
                        </ul>

                        <p class="fw-bold">Serious symptoms:</p>
                        <ul>
                            <li>difficulty breathing or shortness of breath</li>
                            <li>loss of speech or mobility, or confusion</li>
                            <li>chest pain.</li>
                        </ul>

                        <p>Seek immediate medical attention if you have serious symptoms. Always call before visiting your doctor or health facility. </p>

                        <p>People with mild symptoms who are otherwise healthy should manage their symptoms at home. </p>

                        <p>On average it takes 5-6 days from when someone is infected with the virus for symptoms to show, however it can take up to 14 days. </p>

                        <h2>Related Links</h2>
                        <ul>
                            <li><a href="https://www.cnnphilippines.com/news/" target="_blank">Latest COVID-19 News</a></li>
                            <li><a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/covid-19-vaccines" target="_blank">COVID-19 VACCINES</a></li>
                            <li><a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/covid-19-vaccines/explainers" target="_blank">Vaccines explained series</a></li>
                            <li><a href="https://www.who.int/teams/health-care-readiness-clinical-unit/covid-19/therapeutics" target="_blank">Therapeutics and COVID-19</a></li>
                        </ul>
                    </div>
                    
                    <!-- SWAB TEST -->
                    <div class="tab-pane fade" id="nav-swab" role="tabpanel" aria-labelledby="nav-swab-tab">

                        <?php
                        $sql = "SELECT * FROM `hospital`";

                        $result = mysqli_query($conn, $sql);
                        $hospitals = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        ?>

                        <!-- LIST OF HOSPITALS -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <td colspan="4" class="text-center fw-bold">List of Hospitals</td>
                                    </tr>
                                    <tr>
                                        <td> Hospital Name </td>
                                        <td> Hospital Location </td>
                                        <td> Hospital Tel No. </td>
                                        <td> Hospital Email </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($hospitals)) { ?>
                                        <?php foreach ($hospitals as $hospital) { ?>
                                            <tr>
                                                <td><a href="<?php echo $hospital['h_link'] ?>" target="_blank"><?php echo $hospital['h_name'] ?></a></td>
                                                <td><?php echo $hospital['location'] ?></td>
                                                <td><?php echo $hospital['tel_no'] ?></td>
                                                <td><?php echo $hospital['email'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr>
                                            <td>There are no hospitals to be displayed.</td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>

                        <hr class="mb-4">

                        <?php
                        $user_id = $_SESSION['user_id'];
                        $sql = "SELECT * FROM `swab_history` JOIN `user` ON `user`.`User ID` = `swab_history`.`user_id` JOIN `hospital` ON `swab_history`.`hospital_id` = `hospital`.`h_id`
                                WHERE `User ID` =" . $user_id;

                        $result = mysqli_query($conn, $sql);
                        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        ?>
                        <?php if (count($items)) { ?>
                            <table class="table">
                                <thead class="table-light">
                                    <td class="text-center fw-bold">Your Swab Test Results</td>
                                </thead>
                            </table>
                            <?php foreach ($items as $item) { ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-light">
                                            <td> Hospital Name </td>
                                            <td> Hospital Location </td>
                                            <td> Hospital Tel No. </td>
                                            <td> Hospital Email </td>
                                            <td> Your Result </td>
                                            <td> Result Category </td>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="<?php echo $item['h_link'] ?>" target="_blank"><?php echo $item['h_name'] ?></a></td>
                                                <td><?php echo $item['location'] ?></td>
                                                <td><?php echo $item['tel_no'] ?></td>
                                                <td><?php echo $item['email'] ?></td>
                                                <td><?php echo $item['status'] ?></td>
                                                <td><?php echo $item['category'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <p class="text-center">You have no swab test history.</p>
                        <?php } ?>


                    </div>


                    <!-- VACCINE -->
                    <div class="tab-pane fade" id="nav-vaccine" role="tabpanel" aria-labelledby="nav-vaccine-tab">
                        <h3>Different COVID-19 Vaccines</h3>

                        <p>
                            COVID-19 vaccines are now widely available for people ages 5 years and older. In most cases, you do not need an appointment. Learn how to find a COVID-19 vaccine so you can get vaccinated as soon as possible.
                        </p>
                        <p>
                            All currently approved or authorized COVID-19 vaccines are safe and effective and reduce your risk of severe illness. CDC does not recommend one vaccine over another.
                        </p>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-light">
                                    <td> Pfizer-BioNTech </td>
                                    <td> Moderna </td>
                                    <td> Johnson & Johnson's Janssen </td>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ages Recommended
                                            5+ years old </td>
                                        <td>Ages Recommended
                                            18+ years old </td>
                                        <td>Ages Recommended
                                            18+ years old </td>
                                    </tr>
                                    <tr>
                                        <td>Primary Series
                                            2 doses
                                            Given 3 weeks (21 days) apart </td>
                                        <td>Primary Series
                                            2 doses
                                            Given 4 weeks (28 days) apart </td>
                                        <td>Primary Series
                                            1 dose </td>
                                    </tr>
                                    <tr>
                                        <td>Booster Dose
                                            Everyone ages 18 years and older is eligible at least 6 months after the last dose in their primary series. Any of the three COVID-19 vaccines can be used for the booster dose. </td>
                                        <td>Booster Dose
                                            Everyone ages 18 years and older is eligible at least 6 months after the last dose in their primary series. Any of the three COVID-19 vaccines can be used for the booster dose. </td>
                                        <td>Booster Dose
                                            At least 2 months after the first dose for all people ages 18 years and older. Any of the three COVID-19 vaccines can be used for the booster dose. </td>
                                    </tr>
                                    <tr>
                                        <td>When Fully Vaccinated
                                            2 weeks after 2nd dose </td>
                                        <td>Booster Dose
                                            When Fully Vaccinated
                                            2 weeks after 2nd dose </td>
                                        <td>When Fully Vaccinated
                                            2 weeks after 1st dose </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>
                            If you had a severe allergic reaction after a previous dose or if you have a known (diagnosed) allergy to a COVID-19 vaccine ingredient, you should not get that vaccine. If you have been instructed not to get one type of COVID-19 vaccine, you may still be able to get another type. Learn more information for people with allergies.
                        </p>
                        <p>
                            You should get your second shot as close to the recommended 3-week or 4-week interval as possible.
                        </p>

                        <h2>Additional Recommendations for Immunocompromised People</h2>
                        <p>
                            Additional primary dose: Moderately to severely immunocompromised people who are 12 years and older and received a Pfizer-BioNTech primary series or 18 years and older and received a Moderna primary series should receive an additional primary dose of the same vaccine at least 28 days after their second dose.
                        </p>
                        <p>
                            Booster dose: Moderately to severely immunocompromised people who are 18 years of age and older and received a Pfizer-BioNTech or Moderna primary series are also eligible for a booster dose at least 6 months after their additional primary dose, using any of the three COVID-19 vaccines.
                        </p>
                        <p>
                            Immunocompromised people who received a J&J/Janssen vaccine are not recommended to receive an additional primary dose, but should receive a booster dose at least 2 months after their initial dose, using any of the three COVID-19 vaccines.
                        </p>


                    </div>
            </div>
        </div>
    </div>
    </div>
    <div class="conatiner d-flex justify-content-center mt-5">
	<form>
		<span class="iconify" data-icon="bi:arrow-left-circle" data-width="50" data-height="50" type="button" value="Go back!" onclick="history.back()">
		</span>
	</form>
	</div>

    <script>
        var triggerTabList = [].slice.call(document.querySelectorAll('#nav-tab button'))
        triggerTabList.forEach(function(triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', function(event) {
                event.preventDefault()
                tabTrigger.show()
            })
        })
    </script>

</body>

</html>
Feature: Developer registers time
  In order to properly bill my clients
  As a developer
  I need to be able to track my time spent working for them

  Scenario: Successfully registering time for one client
    Given a client named "Crazy Agency"
    When I track 4 hours today for the client
    And I track 8 hours yesterday for the client
    Then my timesheet for the client should contain 12 hours:
      | 8 hours | for yesteday |
      | 4 hours | for today    |


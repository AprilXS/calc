pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo 'Building..'
            }
        }
        stage("Execute Ansible") {
            steps {
            echo 'Executing Ansible Playbook'
                // ansiblePlaybook credentialsId: '8bc2cf17-308b-4992-bd53-bf8f43d0c3ad',
                //                  disableHostKeyChecking: true,
                //                  installation: 'ansible',
                //                  inventory: 'ansible/inventory/hosts',
                //                  playbook: 'ansible/vm-setup.yml'
            }    
        }    
    }
}
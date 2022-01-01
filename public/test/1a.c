#include<stdio.h>
#include<stdlib.h>
#include<time.h>


int PrepareData(){
    int ARR[16],randomNumber,lowerNum=1,uperNum=16,i,n,commnd;
    printf("Enter Length of Array : ");
    scanf("%d",&n);
    srand(time(NULL));
    for(i=0;i<n;i++){
        randomNumber = (rand() % (uperNum - lowerNum +1)) + lowerNum;
        ARR[i]=randomNumber;
    }
    printf("Your Data is Inserted Randomly Select Option to Go : ");
    printf("\n\t\t1.Print All Data\n\t\t2.Delete Any Data\n\t\t3.PrintAll Unique Data\n\t\t4.Count All Duplicate data");
    printf("\n\nEnter Your Command : ");
    scanf("%d",&commnd);
    switch(commnd){
        case 1:DisplayArr(ARR,n);
        break;
        case 2:DeleteSpecific(ARR,n);
        break;
        case 3:PrintUnique(ARR,n);
        break;
        case 4:CountDuplicate(ARR,n);
        break;
        default:NULL;
    }
    return 0;
}


int DisplayArr(int ARR[],int n){
    int i;
    for(i=0;i<n;i++){
        printf("Array Index No %d ARR[%d] : %d\n\n",i+1,i+1,ARR[i]);
    }
    return 0;
}


int DeleteSpecific(int ARR[],int n){
    system("cls");
    int i=0,deleteNum,item,j;
    DisplayArr(ARR,n);
    printf("\n\nEnter The Index Number To Delete : ");
    scanf("%d",&deleteNum);
    item=ARR[deleteNum-1];
    printf("Array Index No %d\n\n",item);
    for(j=deleteNum-1;j<n;j++){
        ARR[j]=ARR[j+1];
    }
    n=n-1;int DeleteSpecific(int ARR[],int n);
    DisplayArr(ARR,n);
}


int PrintUnique(int ARR[],int n){
    int i,j,k,fnd=0;
    printf("Your All Array Number is : ");
    for(k=0;k<n;k++){
        printf("%d ",ARR[k]);
    }
    for(i=0;i<n;i++){
        for(j=0;j<n;j++){
            if (ARR[i] == ARR[j]){
            break;
            }
        }
        if (i == j){
            printf("\n%d ", ARR[i]);
        }
    }
}



int CountDuplicate(int ARR[],int n){
    int i,j,k,count=0;
    for(k=0;k<n;k++){
        printf("%d ",ARR[k]);
    }
    for(i=0; i<n; i++){
        for(j=i+1; j<n; j++){
            if(ARR[i] == ARR[j]){
                count++;
                break;
            }
        }
    }
    printf("\nTotal number of duplicate elements found in array = %d",count);
}


int main(){
    printf("Welcome to Data Programming \n");
    PrepareData();
    return 0;
}




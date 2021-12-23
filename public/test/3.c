#include<stdio.h>
#include<stdlib.h>
#include<time.h>

void PrepareData();
void PrintDetails();
void RevString();

void main()
{
    PrepareData();
}

void PrepareData(){
    int n,randomNumber,uperNum=125,lowerNum=35,i;
    int ARR[100];

    printf("How Many Character Do You Want : ");
    scanf("%d",&n);

    srand(time(NULL));
    for(i=0;i<n;i++){
        randomNumber = (rand() % (uperNum - lowerNum +1)) + lowerNum;
        ARR[i]=randomNumber;
    }
    PrintDetails(ARR,n);
}

void PrintDetails(int ARR[100],int n)
{
    int VowelArr[10]={97,101,105,111,117},i;

    for(i=0;i<n;i++)
    {
        if(ARR[i] == VowelArr[i]){
            printf("The Vowel is %d no Character %c \n",i+1,ARR[i]);
        }else if(ARR[i] >= 65 && ARR[i] <= 122)
        {
            printf("The Consonent is %d no Character %c \n",i+1,ARR[i]);
        }else{
            printf("The Spacial Character is %d %d no Character %c \n",i+1,ARR[i],ARR[i]);
        }
    }

    RevString(ARR , n);
}

void RevString(int ARR[100],int n)
{
    int revstr,i,j;
    for(i=n;i!=0;i--)
    {
        printf("%c  ",ARR[i]);
    }
}
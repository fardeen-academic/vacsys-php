#include <stdio.h>
#include <stdlib.h>

// A Linked List Node
struct Node
{
    int data;
    struct Node *next;
};

// Helper function to print a given linked list
void display_List(struct Node *head)
{
    struct Node *ptr = head;
    while (ptr)
    {
        printf("%d —> ", ptr->data);
        ptr = ptr->next;
    }

    printf("NULL\n");
}

// Helper function to insert a new node at the beginning of the linked list
void insert_Data(struct Node **head, int data)
{
    struct Node *newNode = (struct Node *)malloc(sizeof(struct Node));
    newNode->data = data;
    newNode->next = *head;
    *head = newNode;
}

// Compute a new sorted list representing the intersection of the
// two given sorted lists. This solution uses the local reference
struct Node *sortedIntersect(struct Node *a, struct Node *b)
{
    struct Node *result = NULL;
    struct Node **lastPtrRef = &result;

    // advance comparing the first nodes in both lists.
    // When one or the other list runs out, we are done.
    while (a != NULL && b != NULL)
    {
        // found a node for the intersection
        if (a->data == b->data)
        {
            insert_Data(lastPtrRef, a->data);
            lastPtrRef = &((*lastPtrRef)->next);
            a = a->next;
            b = b->next;
        }
        // advance the smaller list
        else if (a->data < b->data)
        {
            a = a->next;
        }
        else
        {
            b = b->next;
        }
    }

    return result;
}

int main()
{
    // input keys
    int keys[] = {1, 2, 3, 4, 5, 6, 7, 8, 9, 10};
    int n = sizeof(keys) / sizeof(keys[0]);

    struct Node *a = NULL;
    for (int i = n - 1; i >= 0; i = i - 3)
    {
        insert_Data(&a, keys[i]);
    }

    struct Node *b = NULL;
    for (int i = n - 1; i >= 0; i = i - 2)
    {
        insert_Data(&b, keys[i]);
    }

    // print both lists
    printf("First List: ");
    display_List(a);

    printf("Second List: ");
    display_List(b);

    struct Node *head = sortedIntersect(a, b);

    printf("\nAfter Intersection: ");
    display_List(head);

    return 0;
